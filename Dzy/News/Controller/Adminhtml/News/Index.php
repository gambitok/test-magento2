<?php

namespace Dzy\News\Controller\Adminhtml\News;

class Index extends \Magento\Backend\App\Action
{
    protected $_resultPageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        mail('gambitokgd@yahoo.com', 'the subject', 'message3', 'from me');
        mail("gambitokgd@yahoo.com", "My Subject", "Line 1\nLine 2\nLine 3");

        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Dzy_News::news_list');
        $resultPage->getConfig()->getTitle()->prepend(__('News List'));
        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Dzy_News::news_list');
    }
}