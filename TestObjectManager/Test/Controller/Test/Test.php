<?php

namespace TestObjectManager\Test\Controller\Test;

use Magento\Framework\App\Action\Context;
use \Magento\Framework\ObjectManagerInterface;

class Test extends \Magento\Framework\App\Action\Action
{

    public function __construct(Context $context)
    {
        return parent::__construct($context);
    }

    public function execute()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $myObjectModelCustom = $objectManager->create(\TestObjectManager\Test\Model\Test::class);
        echo $myObjectModelCustom->getMassage();
    }
}