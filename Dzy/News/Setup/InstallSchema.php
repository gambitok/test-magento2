<?php

namespace Dzy\News\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
{

$table = $setup->getConnection()
->newTable($setup->getTable('dzy_news'))
->addColumn(
    'id_news',
    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
    null,
    ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
    'News ID'
)
->addColumn(
    'title',
    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
    100,
    ['nullable' => false, 'default' => ''],
    'News title'
)
->addColumn(
    'description',
    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
    255,
    ['nullable' => false, 'default' => ''],
    'News description'
)
->addColumn(
    'created_at',
    \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
    null,
    ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
    'Created At'
)
->addColumn(
    'updated_at',
    \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
    null,
    ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
    'Updated At'
)
->setComment("Greeting Message - News OPA");
$setup->getConnection()->createTable($table);
}
}