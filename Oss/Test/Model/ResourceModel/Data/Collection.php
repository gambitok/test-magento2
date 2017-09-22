<?php
namespace Oss\Test\Model\ResourceModel\Data;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'data_id';

    /**
     * Collection initialisation
     */
    protected function _construct()
    {
        $this->_init('Oss\Test\Model\Data','Oss\Test\Model\ResourceModel\Data');
    }
}