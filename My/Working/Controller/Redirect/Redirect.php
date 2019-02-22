<?php

namespace My\Working\Controller\Redirect;

class Redirect extends \Magento\Framework\App\Action\Action
{

    protected $_pageFactory;

//    protected $request;


    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
//        \Magento\Framework\App\Request\Http $request
    )
    {
//        $this->_request = $request;
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
            $actionName = $this->getRequest()->getActionName();
             echo 123 . '<br>';

        $forward = $this->getRequest()->getParam('forward');
        if(isset($forward) && $forward == 1){
            $this->_forward('two','two');
        } else {
            echo $actionName;
        }

    }
}