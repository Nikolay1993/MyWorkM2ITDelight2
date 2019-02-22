<?php

namespace Training\ModuleWithCollection\Controller\Test;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;

class Test extends Action
{

    protected $_pageFactory;
    protected $cmsPageCollectionFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Cms\Model\ResourceModel\Page\CollectionFactory  $cmsPageCollectionFactory
    ) {
        $this->cmsPageCollectionFactory = $cmsPageCollectionFactory;
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {

        $collection = $this->cmsPageCollectionFactory->create();
            foreach ($collection as $item){
                var_dump ($item->getData());
            }

       return $this->_pageFactory->create();
    }
}