<?php
namespace Oss\Test\Controller\Adminhtml\Data;

use Oss\Test\Controller\Adminhtml\Data;

class Edit extends Data
{
    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $dataId = $this->getRequest()->getParam('data_id');
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Oss_Test::data')
            ->addBreadcrumb(__('Data'), __('Data'))
            ->addBreadcrumb(__('Manage Data'), __('Manage Data'));

        if ($dataId === null) {
            $resultPage->addBreadcrumb(__('New Data'), __('New Data'));
            $resultPage->getConfig()->getTitle()->prepend(__('New Data'));
        } else {
            $resultPage->addBreadcrumb(__('Edit Data'), __('Edit Data'));
            $resultPage->getConfig()->getTitle()->prepend(
                $this->_dataRepository->getById($dataId)->getDataTitle()
            );
        }
        return $resultPage;
    }
}