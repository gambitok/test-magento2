<?php
namespace DmDz  \TestProject\Model\ResourceModel;

class Question extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Resource initialization
     */
    protected function _construct()
    {
        $this->_init(\DmDz\TestProject\Model\Question::TABLE_NAME, 'id');
    }
}