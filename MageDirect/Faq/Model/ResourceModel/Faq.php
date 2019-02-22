<?php

namespace MageDirect\Faq\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Faq extends AbstractDb
{

    protected function _construct()
    {
        $this->_init('magedirect_faq', \MageDirect\Faq\Api\Data\FaqInterface::FAQ_ID);
    }

}