<?php

namespace My\Working\Controller\Hello;

/**
 * Class Hello
 * @package My\Working\Controller\Hello
 */
class Hello extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @var \Magento\Catalog\Model\ProductFactory
     */
    protected $productModel;

    /**
     * Hello constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Catalog\Model\ProductFactory $productModel
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Catalog\Model\ProductFactory $productModel,
        \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->productModel = $productModel;
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('buy');
        if (isset($id)) {
            $productModel = $this->productModel->create()->load($id);
            $priceProduct = $productModel->getPrice();
        }

        if ($priceProduct >= 100) {
            $this->messageManager->addSuccessMessage(__('Вы получили бесплатную достваку'));
        } else {
            $priceProduct -= 100;
            $this->messageManager->addErrorMessage(__("До бесплтаной доствки вам не хватает $priceProduct$"));
        }

        return $this->_pageFactory->create();
    }
}
