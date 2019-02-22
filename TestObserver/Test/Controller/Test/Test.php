<?php

namespace TestObserver\Test\Controller\Test;

use Magento\Framework\App\Action\Context;

class Test extends \Magento\Framework\App\Action\Action
{

    private $configEvent;

    private $collectionIvent;

    protected $_pageFactory;


    public function __construct(
        Context $context,
        \Magento\Framework\Event\Collection $collectionIvent,
        \Magento\Framework\Event\ConfigInterface $config,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    ) {
        $this->_pageFactory = $pageFactory;
        $this->configEvent = $config;
        $this->collectionIvent = $collectionIvent;
        return parent::__construct($context);
    }

    public function execute()
    {


       // Создаем обьект с событием

        $textDisplay = new \Magento\Framework\DataObject(array('lable' => 'My observer'));

        //Отправляем событие

        $this->_eventManager->dispatch('testobserver_test_display_text', ['mp_text' => $textDisplay]);
        echo $textDisplay->getDispl();
//        exit;


//        print_r($this->configEvent->getObservers('testobserver_test_display_text'));

//        var_dump($this->configEvent);
//        var_dump($this->configEvent['_dataContainer']['_data']);
//        foreach ($this->configEvent['_dataContainer']['_data'] as $item)
//        {
//            echo $item;
//        }

//        $this->configEvent->dataContainer;


        return $this->_pageFactory->create();

    }
}