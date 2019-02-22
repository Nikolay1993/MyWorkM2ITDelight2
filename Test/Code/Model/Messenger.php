<?php
namespace Test\Code\Model;
class Messenger
{
    public function getMassage($hello = '')
    {
        if($hello != ''){
        return $hello;
        } else {
            return 'not hello';
        }
    }
}