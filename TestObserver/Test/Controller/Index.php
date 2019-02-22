<?php

namespace TestObserver\Test\Controller;

abstract class Index extends \Magento\Framework\App\Action\Action
{

    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {

        return parent::dispatch($request);
    }



}