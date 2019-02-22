<?php

namespace Test\Code\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Test extends AbstractDb
{

    protected function _construct()
    {
        $this->_init('test_code_table', 'id');
    }

}