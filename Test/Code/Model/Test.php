<?php

namespace Test\Code\Model;

use \Magento\Framework\Model\AbstractModel;
class Test extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Test\Code\Model\ResourceModel\Test');
    }

}