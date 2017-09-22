<?php
namespace Oss\Test\Controller\Adminhtml\Data;

use Oss\Test\Model\Data;

class MassDelete extends MassAction
{
    /**
     * @param Data $data
     * @return $this
     */
    protected function massAction(Data $data)
    {
        $this->_dataRepository->delete($data);
        return $this;
    }
}