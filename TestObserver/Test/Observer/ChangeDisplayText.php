<?php

namespace TestObserver\Test\Observer;

class ChangeDisplayText implements \Magento\Framework\Event\ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {


        //если событие есть получаем его

        $displayText = $observer->getData('mp_text');
        echo $displayText->getLable() . " - Event </br>";

        //задаем значения для события

        $displayText->setDispl('Catch magento 2 event successfully!!!');
//        echo $displayText->getDispl();
        return $this;





    }
}