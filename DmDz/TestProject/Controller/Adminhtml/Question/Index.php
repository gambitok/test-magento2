<?php

namespace DmDz\TestProject\Controller\Adminhtml\Question;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;

class Index extends Action
{
    protected $resultPageFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Index action
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('DmDz_TestProject::question');
        $resultPage->addBreadcrumb(__('User questions'), __('User questions'));
        $resultPage->addBreadcrumb(__('Manage user questions'), __('Manage user questions'));
        $resultPage->getConfig()->getTitle()->prepend(__('User questions'));

        return $resultPage;
    }

    /**
     * Check permission
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('DmDz_TestProject::questions');
    }
}