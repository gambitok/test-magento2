<?php

namespace DmDz\TestProject\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use DmDz\TestProject\Api\Data\QuestionInterface;
use DmDz\TestProject\Api\QuestionRepositoryInterface;
use DmDz\TestProject\Model\ResourceModel\Question as QuestionResourceModel;

class QuestionRepository implements QuestionRepositoryInterface
{
    protected $instancesById = [];

    protected $resourceModel;

    private $questionFactory;

    private $collectionFactory;

    public function __construct(
        QuestionFactory $questionFactory,
        QuestionResourceModel\CollectionFactory $collectionFactory,
        QuestionResourceModel $resourceModel
    )
    {
        $this->resourceModel = $resourceModel;
        $this->questionFactory = $questionFactory;
        $this->collectionFactory = $collectionFactory;
    }

    public function save(QuestionInterface $question)
    {
        try {
            $this->resourceModel->save($question);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__('Unable to save question'));
        }

        unset($this->instancesById[$question->getId()]);
        return $this->getById($question->getId());
    }

    public function getById($questionId, $editMode = false, $storeId = null, $forceReload = false)
    {
        $cacheKey = $this->getCacheKey([$editMode, $storeId]);
        if (!isset($this->instancesById[$questionId][$cacheKey]) || $forceReload) {
            $question = $this->questionFactory->create();
            if ($editMode) {
                $question->setData('_edit_mode', true);
            }
            if ($storeId !== null) {
                $question->setData('store_id', $storeId);
            }
            $this->resourceModel->load($question, $questionId, 'question_id');
            if (!$question->getId()) {
                throw new NoSuchEntityException(__('Requested question doesn\'t exist'));
            }
            $this->instancesById[$questionId][$cacheKey] = $question;
        }
        return $this->instancesById[$questionId][$cacheKey];
    }

    public function delete(QuestionInterface $question)
    {
        $questionId = $question->getId();
        try {
            $this->resourceModel->delete($question);
        } catch(\Exception $e) {

        }
        unset($this->instancesById[$questionId]);
        return true;
    }

    public function deleteById($questionId)
    {
        $question = $this->getById($questionId);
        return $this->delete($question);
    }

    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();

        foreach ((array)$searchCriteria->getSortOrders() as $sortOrder) {
            $field = $sortOrder->getField();
            $collection->addOrder(
                $field,
                ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
            );
        }

        $collection->setCurPage($searchCriteria->getCurrentPage());
        $collection->setPageSize($searchCriteria->getPageSize());
        $collection->load();

        $searchResult = $this->searchResultsFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());
    }

    public function cleanCache()
    {
        $this->instancesById = [];
    }

    protected function getCacheKey($data)
    {
        $serializeData = [];
        foreach ($data as $key => $value) {
            if (is_object($value)) {
                $serializeData[$key] = $value->getId();
            } else {
                $serializeData[$key] = $value;
            }
        }

        return md5(serialize($serializeData));
    }
}