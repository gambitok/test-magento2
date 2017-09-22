<?php
namespace Oss\Test\Controller\Adminhtml\Data;

use Oss\Test\Model\Data;

class MassEnable extends MassAction
{

    /**
     * @param Data $data
     * @return $this
     */
    protected function massAction(Data $data)
    {
        $data->setIsActive(true);
        $this->_dataRepository->save($data);
        return $this;
    }
}