<?php
namespace Oss\Test\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\Context;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Data extends AbstractDb
{
    protected $_date;

    /**
     * Data constructor.
     */
    public function __construct(
        Context $context,
        DateTime $date
    ) {
        $this->_date = $date;
        parent::__construct($context);
    }

    /**
     * Resource initialisation
     */
    protected function _construct()
    {
        $this->_init('oss_test_news', 'data_id');
    }

    /**
     * Before save callback
     */
    protected function _beforeSave(AbstractModel $object)
    {
        $object->setUpdatedAt($this->_date->gmtDate());
        if ($object->isObjectNew()) {
            $object->setCreatedAt($this->_date->gmtDate());
        }
        return parent::_beforeSave($object);
    }
}