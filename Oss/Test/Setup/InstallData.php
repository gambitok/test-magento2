<?php
namespace Oss\Test\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallData implements InstallDataInterface {

    /**
     * Install data
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.0.0', '<')) {
            $data = [
                [
                    'data_title' => 'Hello World!',
                    'data_description' => 'first description',
                    'is_active' => 1
                ],
                [
                    'data_title' => 'Hello - 2',
                    'data_description' => 'second description',
                    'is_active' => 1
                ],
                [
                    'data_title' => 'Hello - 3',
                    'data_description' => 'lalalla lalalal lallala lalal',
                    'is_active' => 0
                ],
                [
                    'data_title' => 'Hello - 4',
                    'data_description' => 'blalblalbla bala',
                    'is_active' => 1
                ]
            ];

            foreach ($data as $datum) {
                $setup->getConnection()
                    ->insertForce($setup->getTable('oss_test_news'), $datum);
            }
        }
    }
}