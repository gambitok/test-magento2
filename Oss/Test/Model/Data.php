<?php
namespace Oss\Test\Model;

use Magento\Framework\Model\AbstractModel;
use Oss\Test\Api\Data\DataInterface;

class Data extends AbstractModel
    implements DataInterface
{

    /**
     * Cache tag
     */
    const CACHE_TAG = 'oss_test_news';

    /**
     * Initialise resource model
     */
    protected function _construct()
    {
        $this->_init('Oss\Test\Model\ResourceModel\Data');
    }

    /**
     * Get cache identities
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get title
     */
    public function getDataTitle()
    {
        return $this->getData(DataInterface::DATA_TITLE);
    }

    /**
     * Set title
     */
    public function setDataTitle($title)
    {
        return $this->setData(DataInterface::DATA_TITLE, $title);
    }

    /**
     * Get data description
     */
    public function getDataDescription()
    {
        return $this->getData(DataInterface::DATA_TITLE);
    }

    /**
     * Set data description
     */
    public function setDataDescription($description)
    {
        return $this->setData(DataInterface::DATA_DESCRIPTION, $description);
    }

    /**
     * Get is active
     */
    public function getIsActive()
    {
        return $this->getData(DataInterface::IS_ACTIVE);
    }

    /**
     * Set is active
     */
    public function setIsActive($isActive)
    {
        return $this->setData(DataInterface::IS_ACTIVE, $isActive);
    }

    /**
     * Get created at
     */
    public function getCreatedAt()
    {
        return $this->getData(DataInterface::CREATED_AT);
    }

    /**
     * Set created at
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(DataInterface::CREATED_AT, $createdAt);
    }

    /**
     * Get updated at
     */
    public function getUpdatedAt()
    {
        return $this->getData(DataInterface::UPDATED_AT);
    }

    /**
     * Set updated at
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(DataInterface::UPDATED_AT, $updatedAt);
    }
}