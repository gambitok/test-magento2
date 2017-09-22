<?php

namespace Oss\Test\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface
{

public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
{
$setup->startSetup();
if ($context->getVersion()
&& version_compare($context->getVersion(), '1.0.1') < 0
) {
$table = $setup->getTable('oss_test_news');

//$setup->getConnection()
//->insertForce($table, ['data_id' => 5, 'data_title' => 'news_4', 'data_description' => '4lalallal', 'is_active' => 1]);
//
//$setup->getConnection()
//->update($table, ['author' => 'Fox'], 'data_id IN (0,1,2,3,4,5)');
//
}
$setup->endSetup();
}
}