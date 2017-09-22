<?php

namespace Dzy\News\Model\ResourceModel\News;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id_news';

    protected function _construct()
    {
        $this->_init('Dzy\News\Model\News', 'Dzy\News\Model\ResourceModel\News');
    }
}