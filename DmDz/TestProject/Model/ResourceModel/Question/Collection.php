<?php
namespace DmDz\TestProject\Model\ResourceModel\Question;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';

    /**
     * Define resource model
     */

    protected function _construct()
    {
        $this->_init('DmDz\TestProject\Model\Question', 'DmDz\TestProject\Model\ResourceModel\Question');
    }
}
