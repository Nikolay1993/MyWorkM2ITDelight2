<?php

namespace MyLayout\Test\Block;

class Test extends \Magento\Framework\View\Element\Template
{

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        array $data = []
    )
    {
        parent::__construct($context, $data);
    }

    protected function _prepareLayout()
    {
        $this->setMessage('Hello Again World');
        $this->setName($this->getRequest()->getParam('name'));
        $this->setblabla('hello');
    }

    public function getGoodbyeMessage()
    {
        return 'Goodbye World';
    }

}