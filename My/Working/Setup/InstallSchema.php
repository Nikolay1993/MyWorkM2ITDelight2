<?php

namespace My\Working\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $table = $installer->getConnection()->newTable(
            $installer->getTable('my_test_blog')
        )->addColumn(
            'id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true,],
            'ID'
        )->addColumn(
            'author',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false,],
            'Author'
        )->addColumn(
            'publication_date',
            Table::TYPE_DATETIME,
            255,
            ['nullable' => false,],
            'Publication_date'
        )->addColumn(
            'editions',
            Table::TYPE_TEXT,
            10000,
            ['nullable' => false,],
            'Editions'
        );
        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}