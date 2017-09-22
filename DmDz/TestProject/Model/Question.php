<?php

namespace DmDz\TestProject\Model;

use Magento\Framework\Model\AbstractModel;

class Question extends AbstractModel
{
    /**
     * Table name
     */
    const TABLE_NAME = 'user_questions';

    protected function _construct()
    {
        $this->_init('DmDz\TestProject\Model\ResourceModel\Question');
    }
}