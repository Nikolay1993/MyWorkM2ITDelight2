<?php


namespace My\Working\Block;


use Magento\Framework\View\Element\Template;

class Custom extends \Magento\Framework\View\Element\Template
{
    private $scopeConfig;


    public function __construct(Template\Context $context, array $data = [], \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    public function customGetSubtotal()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $cart = $objectManager->get('\Magento\Checkout\Model\Cart');

        $subTotal = $cart->getQuote()->getSubtotal();

        return $subTotal;
    }

    public function customMassage()
    {

            if ($this->customGetSubtotal() >= $this->getFreeShippingSubtotal() && $this->getFreeShippingSubtotal() != false) {
                return 'Вы получили бесплатную достваку';
            } elseif ($this->customGetSubtotal() < $this->getFreeShippingSubtotal() && $this->customGetSubtotal() > 1 && $this->getFreeShippingSubtotal() != false) {
                $massage = $this->customGetSubtotal() - $this->getFreeShippingSubtotal();
                return "До бесплтаной доствки вам не хватает $massage$";
            } else {
                return false;
            }

    }

    public function getFreeShippingSubtotal()
    {

        if($this->scopeConfig->getValue('carriers/freeshipping/active', \Magento\Store\Model\ScopeInterface::SCOPE_STORE) == 1){
            return $this->scopeConfig->getValue('carriers/freeshipping/free_shipping_subtotal', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        } else {
            return false;
        }

    }




}