<?php

namespace MyCustomShipping\Test\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Warehouse extends AbstractDb
{

    protected function _construct()
    {
        $this->_init('custom_novaposhta_warehouse', 'id');
    }

}