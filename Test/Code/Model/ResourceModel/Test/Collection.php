<?php

namespace Test\Code\Model\ResourceModel\Test;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Test\Code\Model\Test', 'Test\Code\Model\ResourceModel\Test');
    }
}