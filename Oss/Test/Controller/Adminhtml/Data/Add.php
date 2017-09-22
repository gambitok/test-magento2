<?php
namespace Oss\Test\Controller\Adminhtml\Data;

use Oss\Test\Controller\Adminhtml\Data;

class Add extends Data
{
    /**
     * Forward to edit
     */
    public function execute()
    {
        $resultForward = $this->_resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
}