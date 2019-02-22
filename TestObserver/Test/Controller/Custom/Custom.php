<?php

namespace TestObserver\Test\Controller\Custom;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\ActionInterface;
use TestObserver\Test\Controller\Index;
use Magento\Framework\App\Request\Http as RequestHttp;
use Magento\Framework\App\HttpRequestInterface;
use Magento\Framework\App\Request\Http;
use Magento\Framework\App\FrontControllerInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;

class Custom extends \Magento\Framework\App\Action\AbstractAction
{

    public function dispatch(RequestInterface $request)
    {
        return $this->execute();
    }

    public function execute()
    {
        echo 123;
        return $this->_response;
    }
}