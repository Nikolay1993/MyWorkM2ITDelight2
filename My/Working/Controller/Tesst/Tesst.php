<?php

namespace My\Working\Controller\Tesst;

class Tesst extends \Magento\Framework\App\Action\Action
{

    protected $_pageFactory;


    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        //        $block = $this->_view->getLayout()
//            ->createBlock('My\Working\Block\Test')
//            ->setTemplate('My_Working::test.phtml')
//            ->toHtml();
//
//        $this->getResponse()->setBody($block);


        $resultPage = $this->_pageFactory->create();

        $block = $resultPage->getLayout()
            ->createBlock('My\Working\Block\Test')
            ->setTemplate('My_Working::test.phtml')
            ->toHtml();

        $this->getResponse()->setBody($block);

        return $resultPage;

    }
}