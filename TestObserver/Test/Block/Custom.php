<?php


namespace TestObserver\Test\Block;


use Magento\Framework\View\Element\Template;

class Custom extends \Magento\Framework\View\Element\Template
{
    public $listDispatchedEvents;

    public function __construct(Template\Context $context, array $data = [], \TestObserver\Test\Plugin\ListDispatchedEvents $listDispatchedEvents)
    {
        $this->listDispatchedEvents = $listDispatchedEvents;
        parent::__construct($context, $data);
    }

    public function getListDispatchedEvents()
    {
        return $this->listDispatchedEvents->arr;
    }


}