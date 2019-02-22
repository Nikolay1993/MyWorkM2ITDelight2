<?php

namespace Test\Code\Controller\Test;



use Magento\Framework\App\Action\Context;


class Test extends \Magento\Framework\App\Action\Action
{

    protected $_pageFactory;

    public $myTestModel;

    public function __construct(
        Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Test\Code\Model\Test $myTestModel
    ) {
        $this->_pageFactory = $pageFactory;
        $this->myTestModel = $myTestModel;
        return parent::__construct($context);
    }

    public function execute()
    {

        $name = $this->getRequest()->getParam('add');

        $pageFactory = $this->_pageFactory->create();

        if(isset($name)) {
            $model = $this->myTestModel;
            $model->setName($name);
            if ($model->save() == true ) {
                $model->save();
                echo 'used seve';
            }
        }

       return $pageFactory;
    }
}