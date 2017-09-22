<?php

namespace Dzy\News\Model;

use Dzy\News\Api\Data\NewsInterface;

class News extends \Magento\Framework\Model\AbstractModel implements NewsInterface
{
    const CACHE_TAG = 'dzy_news';
    protected $_cacheTag = 'dzy_news';
    protected $_eventPrefix = 'dzy_news';

    protected function _construct()
    {
        $this->_init('Dzy\News\Model\ResourceModel\News');
    }

    public function getIdNews()
    {
        return $this->getData(self::ID_NEWS);
    }

    public function setIdNews($id_news)
    {
        return $this->setData(self::ID_NEWS, $id_news);
    }

    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    public function setCreatedAt($create_at)
    {
        return $this->setData(self::CREATED_AT, $create_at);
    }

    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    public function setUpdatedAt($update_at)
    {
        return $this->setData(self::UPDATED_AT, $update_at);
    }

    public function getAuthor()
    {
        return $this->getData(self::AUTHOR);
    }

    public function setAuthor($author)
    {
        return $this->setData(self::AUTHOR, $author);
    }

}