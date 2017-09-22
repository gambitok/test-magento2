<?php

namespace Dzy\News\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{

public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
{
    $setup->getConnection()->insertForce(
        $setup->getTable('dzy_news'),
        ['id_news' => 0, 'title' => 'news_1', 'description' => '1lalallal']
    );
    $setup->getConnection()->insertForce(
        $setup->getTable('dzy_news'),
        ['id_news' => 1, 'title' => 'news_2', 'description' => '2lalallal']
    );
    $setup->getConnection()->insertForce(
        $setup->getTable('dzy_news'),
        ['id_news' => 2, 'title' => 'news_3', 'description' => '3lalallal']
    );
}
}