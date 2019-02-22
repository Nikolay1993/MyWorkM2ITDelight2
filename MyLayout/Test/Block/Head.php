<?php

namespace MyLayout\Test\Block;

class Head extends \Magento\Framework\View\Element\Template
{

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        array $data = []
    )
    {
        parent::__construct($context, $data);
    }

    public function blabla()
    {
         $this->getData('field1');
         $this->getData('field_two');
    }


}