<?php


namespace TestPlugin\PluginCustom\Controller\Test;

class Test extends \Magento\Framework\App\Action\Action
{
    protected $title;

    public function __construct(
        \Magento\Framework\App\Action\Context $context)
    {
        return parent::__construct($context);
    }

    public function execute()
    {
        $this->setTitle('plugin');
       echo $this->getTitle();
    }

    public function setTitle($title)
    {
        return $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }
}