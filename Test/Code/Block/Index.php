<?php

namespace Test\Code\Block;

/**
 * Class Index
 * @package My\Working\Block
 */
class Index extends \Magento\Framework\View\Element\Template
{
    protected $_productCollectionFactory;

    public $myTestModel;

    public function __construct(
        \Test\Code\Model\Test $myTestModel,
        \Magento\Backend\Block\Template\Context $context,
        array $data = []
    )
    {
        $this->myTestModel = $myTestModel;
        parent::__construct($context, $data);
    }

    public function getMyModel()
    {
        return $this->myTestModel;
    }
}
