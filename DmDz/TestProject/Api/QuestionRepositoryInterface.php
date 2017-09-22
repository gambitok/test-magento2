<?php


namespace DmDz\TestProject\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use DmDz\TestProject\Api\Data\QuestionInterface;

interface QuestionRepositoryInterface
{
    public function save(QuestionInterface $question);

    public function getById($questionId, $editMode = false, $storeId = null, $forceReload = false);

    public function delete(QuestionInterface $question);

    public function deleteById($questionId);

    public function getList(SearchCriteriaInterface $searchCriteria);
}