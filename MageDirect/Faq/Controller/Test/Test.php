<?php

namespace MageDirect\Faq\Controller\Test;

use Magento\Framework\App\Action\Context;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\Search\FilterGroup;
use Magento\Framework\Api\Filter;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Api\SortOrderBuilder;

class Test extends \Magento\Framework\App\Action\Action
{

    public $product;

    public $productRepository;
    public $searchCriteriaBuilder;
    public $sortOrderBuilder;

    public function __construct(Context $context,
                                ProductRepositoryInterface $product,
                                ProductRepositoryInterface $productRepository,
                                SearchCriteriaBuilder $searchCriteriaBuilder,
                                SortOrderBuilder $sortOrderBuilder
    ){
        $this->productRepository = $productRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->sortOrderBuilder = $sortOrderBuilder;
        $this->product = $product;
        return parent::__construct($context);
    }

    public function execute()
    {
//        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//        $search_criteria = $objectManager->create('Magento\Framework\Api\SearchCriteriaInterface');
//        $myproduct = $this->product->getList($search_criteria)->getItems();
//        foreach ($myproduct as $item)
//        {
//            echo $item->getName() . '<br>';
//        }

//        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//        $filter = $objectManager->create('Magento\Framework\Api\Filter');
//        $filter->setData('field','sku');
//        $filter->setData('value','Phone_Apple');
//        $filter->setData('condition_type','like');
//
////add our filter(s) to a group
//        $filter_group = $objectManager->create('Magento\Framework\Api\Search\FilterGroup');
//        $filter_group->setData('filters', [$filter]);
//
////add the group(s) to the search criteria object
//        $search_criteria = $objectManager->create('Magento\Framework\Api\SearchCriteriaInterface');
//        $search_criteria->setFilterGroups([$filter_group]);
//
////query the repository for the object(s)
//        $repo = $objectManager->get('Magento\Catalog\Model\ProductRepository');
//        $result = $this->product->getList($search_criteria);
//        $products = $result->getItems();
//        foreach($products as $product)
//        {
//            echo $product->getSku(),"\n";
//        }

        $this->searchCriteriaBuilder;
//            ->addFilter('sku', 'Phone_Apple', 'like');

        // Sort products heaviest to lightest
        $sortOrder = $this->sortOrderBuilder
            ->setField('price')
            ->setDirection(SortOrder::SORT_ASC)
            ->create();
        $this->searchCriteriaBuilder->addSortOrder($sortOrder);

        // Get the first 5 products
        $this->searchCriteriaBuilder
            ->setPageSize(3)
            ->setCurrentPage(1);

        // Create the SearchCriteria
        $searchCriteria = $this->searchCriteriaBuilder->create();

        // Load the products
        $products = $this->product
            ->getList($searchCriteria)
            ->getItems();

        foreach($products as $product)
        {
            echo $product->getSku() . '<br>';
        }
    }

}