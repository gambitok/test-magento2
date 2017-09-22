<?php

namespace Dzy\News\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;


class UpgradeData implements UpgradeDataInterface
{

public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
{
$setup->startSetup();
if ($context->getVersion()
&& version_compare($context->getVersion(), '0.0.2') < 0
) {
$table = $setup->getTable('dzy_news');
$setup->getConnection()
->insertForce($table, ['id_news' => 3, 'title' => 'news_4', 'description' => '4lalallal']);

$setup->getConnection()
->update($table, ['author' => 'Fox'], 'id_news IN (0,1,2,3)');
}
$setup->endSetup();
}
}