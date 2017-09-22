<?php

namespace Dzy\News\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{

public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
{
$setup->startSetup();
if (version_compare($context->getVersion(), '0.0.2', '<')) {
$setup->getConnection()->addColumn(
$setup->getTable('dzy_news'),
'author',
    [
    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
    'length' => 100,
    'nullable' => false,
    'default' => '',
    'comment' => 'Author'
    ]
);
}
$setup->endSetup();
}
}