<?php
namespace Oss\Test\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface DataSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get data list.
     */
    public function getItems();

    /**
     * Set data list.
     */
    public function setItems(array $items);
}