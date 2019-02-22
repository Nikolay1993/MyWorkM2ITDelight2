<?php

namespace MyCustomShipping\Test\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {

        $installer = $setup;
        $installer->startSetup();


        $table = $installer->getConnection()->newTable(
            $installer->getTable('custom_novaposhta_city')
        )->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Entity Id'
        )->addColumn(
            'city_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['nullable' => false],
            'api Id'
        )
            ->addColumn(
                'city_name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                50,
                [],
                'name of the city'
            )->addColumn(
                'city_name_ru',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                50,
                [],
                'name of the city in ukraine'
            )->addColumn(
                'ref',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                50,
                [''],
                'ref'
            )->setComment(
                'cities from api'
            );
        $installer->getConnection()->createTable($table);
        $eavTable = $installer->getTable('quote_address');
        $columns = [
            'carrier_department' => [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'nullable' => false,
                'comment' => 'novaposhta viddilennya',
            ],
        ];
        $connection = $installer->getConnection();
        foreach ($columns as $name => $definition) {
            $connection->addColumn($eavTable, $name, $definition);
        }

        $table2 = $installer->getConnection()->newTable(
            $installer->getTable('custom_novaposhta_warehouse')
        )->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Entity Id'
        )->addColumn(
            'city_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['nullable' => false,],
            'api Id'
        )
            ->addColumn(
                'warehouse_name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [],
                'name of the city'
            )->addColumn(
                'warehouse_name_ru',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [],
                'name ru'
            )->addColumn(
                'ref',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [],
                'ref'
            )->setComment(
                'warehouses from api'
            );
        $installer->getConnection()->createTable($table2);

        $installer->endSetup();
    }
}