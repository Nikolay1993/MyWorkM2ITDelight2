<?php

namespace My\Working\Controller;


class Router extends \Magento\Framework\App\Router\Base
{
    /**
     * @var \Magento\Framework\App\ActionFactory
     */
    protected $actionFactory;
    /**
     * @var bool
     */
    protected $dispatch = false;

    private $routeConfig;

    private $myflag = false;



    /**
     * @param \Magento\Framework\App\ActionFactory $actionFactory
     * @param \Magento\Framework\App\ResponseInterface $response
     */
    public function __construct(

        \Magento\Framework\App\ActionFactory $actionFactory,
        \Magento\Framework\App\Route\ConfigInterface $routeConfig
    )
    {

        $this->actionFactory = $actionFactory;
        $this->routeConfig = $routeConfig;
;

    }

    public function match(\Magento\Framework\App\RequestInterface $request)
    {

//        echo trim($request->getPathInfo(), '/'); die;
//        echo '<br>';
//        echo  $request->getPathInfo(); die;
//        die();

//        $identifier = trim($request->getPathInfo(), '/');
//        if ($identifier === 'robots.txt') {
//            return null;
//        }
//
//        $modules = $this->routeConfig->getModulesByFrontName('robots');
//        if (empty($modules)) {
//            return null;
//        }
//
//        echo 123; die;

//       echo trim($request->getOriginalPathInfo(), '/'); die();


        /*  роутер для кантроллера тест
                if (!$this->dispatch) {
                    $identifier = trim($request->getPathInfo(), '/');
                    if (strpos($identifier, 'test/test') !== false) {
                        $this->dispatch = true;
                        $request->setModuleName('test')->setControllerName('test')->setActionName('test');
                    } else {
                        return false;
                    }

                    return $this->actionFactory->create('Magento\\Framework\\App\\Action\\Forward');
                }
                return false;
        */


//        if (!$this->dispatch) {
//            $identifier = trim($request->getPathInfo(), '/');
//            if (strpos($identifier, 'test/two') !== false  && !$this->myflag) {
//                $this->dispatch = true;
//                $request->setModuleName('test')->setControllerName('two')->setActionName('two');
//            } elseif (strpos($identifier, 'test/redirect') !== false && !$this->myflag) {
//                $this->dispatch = true;
//                return $request->setModuleName('test')->setControllerName('redirect')->setActionName('redirect');
//            } else {
//                return false;
//            }
//            return $this->actionFactory->create('Magento\\Framework\\App\\Action\\Forward');
//        }
//        return false;

//        if($this->myflag) {
//            if (!$this->dispatch) {
//                $identifier = trim($request->getPathInfo(), '/');
//                if (strpos($identifier, 'test/two') !== false) {
//                    $this->dispatch = true;
//                    $request->setModuleName('test')->setControllerName('two')->setActionName('two');
//                } else {
//                    return false;
//                }
//
//                return $this->actionFactory->create('Magento\\Framework\\App\\Action\\Forward');
//            }
//            return false;
//        }
//
//        if(!$this->myflag) {
//            if (!$this->dispatch) {
//                $identifier = trim($request->getPathInfo(), '/');
//                if (strpos($identifier, 'test/redirect') !== false) {
//                    $this->dispatch = true;
//                    $request->setModuleName('test')->setControllerName('redirect')->setActionName('redirect');
//                } else {
//                    return false;
//                }
//
//                return $this->actionFactory->create('Magento\\Framework\\App\\Action\\Forward');
//            }
//            return false;
//        }



//        if (!$this->dispatch) {
//            $identifier = trim($request->getPathInfo(), '/');
//            if (strpos($identifier, 'test/two') !== false) {
//                $this->dispatch = true;
//                $request->setModuleName('test')->setControllerName('two')->setActionName('two');
//            } else {
//                return false;
//            }
//
//            return $this->actionFactory->create('Magento\\Framework\\App\\Action\\Forward');
//        }
//        return false;

    }


}