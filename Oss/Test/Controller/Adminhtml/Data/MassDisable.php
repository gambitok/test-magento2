<?php
namespace Oss\Test\Controller\Adminhtml\Data;

use Oss\Test\Model\Data;

class MassDisable extends MassAction
{

    /**
     * @param Data $data
     * @return $this
     */
    protected function massAction(Data $data)
    {
        $data->setIsActive(false);
        $this->_dataRepository->save($data);
        return $this;
    }
}