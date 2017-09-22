<?php

namespace DmDz\TestProject\Controller\Adminhtml\Question;

use Magento\Backend\App\Action;
use Magento\Backend\Model\Session;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use DmDz\TestProject\Model\Question;

class Edit extends Action
{

    protected $_coreRegistry = null;

    protected $resultPageFactory;

    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory,
        Registry $registry
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        parent::__construct($context);
    }

    /**
     * Check permission
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('DmDz_TestProject::save');
    }

    protected function _initAction()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('DmDz_TestProject::questions')
            ->addBreadcrumb(__('Question'), __('Question'))
            ->addBreadcrumb(__('Manage user questions'), __('Manage user questions'));
        return $resultPage;
    }

    /**
     * Editing
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $model = $this->_objectManager->create(Question::class);

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This question no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        $data = $this->_objectManager->get(Session::class)->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        $this->_coreRegistry->register('contact_form_question', $model);

        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(__('Edit question'), __('Edit question'));
        $resultPage->getConfig()->getTitle()->prepend(__('Questions'));

        return $resultPage;
    }
}