<?php

namespace Test\Code\Controller\Two;

use Magento\Framework\App\Action\Context;


class Two extends \Magento\Framework\App\Action\Action
{

    public $myCollectionNotFactroy;
    public $myCollectionFactroy;

    public function __construct(Context $context, \Test\Code\Model\Messenger $messenger, \Test\Code\Model\ResourceModel\Test\Collection $myCollectionNotFactroy,
                                \Test\Code\Model\ResourceModel\Test\CollectionFactory $myCollectionFactroy)
    {
//        $this->massage = $messenger;
        $this->myCollectionFactroy = $myCollectionFactroy;
        $this->myCollectionNotFactroy = $myCollectionNotFactroy;
        return parent::__construct($context);
    }

    public function execute()
    {
//       echo $this->massage->getMassage();
        $this->myCollectionNotFactroy;
        $this->myCollectionFactroy->create();
    }
}
