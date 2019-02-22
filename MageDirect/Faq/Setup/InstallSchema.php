<?php

// app/code/[Vendor]/[Module]/Setup/InstallSchema.php

namespace Magedirect\Faq\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table as DdlTable;

class InstallSchema implements InstallSchemaInterface {

    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context) {

        $setup->startSetup();

        $tableName = $setup->getTable('magedirect_faq');
        $ddlTable = $setup->getConnection()->newTable(
            $tableName
        );

        $ddlTable->addColumn(
            'faq_id', DdlTable::TYPE_INTEGER, null, ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true]
        )->addColumn(
            'title', DdlTable::TYPE_TEXT, 255, ['nullable' => false]
        )->addColumn(
            'content', DdlTable::TYPE_TEXT, '2M', ['nullable' => true]
        )->addColumn(
            'created_at', DdlTable::TYPE_TIMESTAMP, null, ['nullable' => false, 'default' => DdlTable::TIMESTAMP_INIT]
        )->addColumn(
            'updated_at', DdlTable::TYPE_TIMESTAMP, null, ['nullable' => false, 'default' => DdlTable::TIMESTAMP_INIT_UPDATE]
        )->addColumn(
            'is_active', DdlTable::TYPE_SMALLINT, null, ['nullable' => false, 'default' => '1']
        )->addIndex(
            $setup->getIdxName($tableName, ['title'], AdapterInterface::INDEX_TYPE_FULLTEXT), ['title'], ['type' => AdapterInterface::INDEX_TYPE_FULLTEXT]
        );
        $setup->getConnection()->createTable($ddlTable);
        $setup->endSetup();
    }
}