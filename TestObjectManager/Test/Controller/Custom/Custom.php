<?php

namespace TestObjectManager\Test\Controller\Custom;

use Magento\Framework\App\Action\Context;

class Custom extends \Magento\Framework\App\Action\Action
{
    public function __construct(Context $context)
    {
        return parent::__construct($context);
    }

    public function execute()
    {
        echo 123;
    }
}