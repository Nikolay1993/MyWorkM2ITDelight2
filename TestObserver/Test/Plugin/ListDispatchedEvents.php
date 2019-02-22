<?php

namespace TestObserver\Test\Plugin;
class ListDispatchedEvents
{
    public $arr = [];

    public function beforeDispatch($subject, $eventName, array $data = [])
    {

//       echo $eventName . '<br>';
        $this->arr[] = $eventName;

    }
}