<?php

namespace MageDirect\Faq\Model\ResourceModel\Test;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('MageDirect\Faq\Model\Faq', 'MageDirect\Faq\Model\ResourceModel\Faq');
    }
}