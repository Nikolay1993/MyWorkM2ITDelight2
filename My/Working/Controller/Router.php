<?php

namespace My\Working\Controller;

/**
 * Inchoo Custom router Controller Router
 *
 * @author      Zoran Salamun <zoran.salamun@inchoo.net>
 */
class Router implements \Magento\Framework\App\RouterInterface
{
    /**
     * @var \Magento\Framework\App\ActionFactory
     */
    protected $actionFactory;

    /**
     * Response
     *
     * @var \Magento\Framework\App\ResponseInterface
     */
    protected $_response;

    /**
     * @var bool
     */
    protected $dispatch = false;

    /**
     * @param \Magento\Framework\App\ActionFactory $actionFactory
     * @param \Magento\Framework\App\ResponseInterface $response
     */
    public function __construct(
        \Magento\Framework\App\ActionFactory $actionFactory,
        \Magento\Framework\App\ResponseInterface $response
    ) {
        $this->actionFactory = $actionFactory;
        $this->_response = $response;
    }

    public function match(\Magento\Framework\App\RequestInterface $request)
    {

//        echo $request->getPathInfo(); die();
        if (!$this->dispatch) {
            $identifier = trim($request->getPathInfo(), '/');
            if (strpos($identifier, 'test/test') !== false) {
                $this->dispatch = true;
                $request->setModuleName('test')->setControllerName('test')->setActionName('test');
            } else {
                return false;
            }


            return $this->actionFactory->create(
                'Magento\Framework\App\Action\Forward',
                ['request' => $request]
            );
        }
        return false;
    }
}