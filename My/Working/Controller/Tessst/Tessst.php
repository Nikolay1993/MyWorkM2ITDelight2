<?php


namespace My\Working\Controller\Tessst;

class Tessst extends \Magento\Framework\App\Action\Action
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
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $cart = $objectManager->get('\Magento\Checkout\Model\Cart');

        $subTotal = $cart->getQuote()->getSubtotal();

        echo $subTotal;
    }
}