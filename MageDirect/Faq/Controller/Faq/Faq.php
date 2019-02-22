<?php

namespace MageDirect\Faq\Controller\Faq;

use Magento\Framework\App\Action\Context;
use MageDirect\Faq\Api\FaqRepositoryInterface;
use MageDirect\Faq\Api\Data\FaqInterface;

class Faq extends \Magento\Framework\App\Action\Action
{

    private $faqRepository;
    private $faq;

    public function __construct(Context $context, FaqRepositoryInterface $faqRepository , FaqInterface $faq)
    {
        $this->faq = $faq;
        $this->faqRepository = $faqRepository;
        return parent::__construct($context);
    }

    public function execute()
    {
        $objectOne = $this->faqRepository->getById(1);
        echo $objectOne->getTitle();




    }
}
