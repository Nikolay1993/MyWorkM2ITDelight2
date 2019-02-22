<?php

namespace MyCustomShipping\Test\Model;

use MyCustomShipping\Test\Api\WarehouseRepositoryInterface;
use MyCustomShipping\Test\Model\ResourceModel\Warehouse as WarehouseResource;
use MyCustomShipping\Test\Model\WarehouseFactory;
use MyCustomShipping\Test\Model\ResourceModel\Warehouse\CollectionFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use MyCustomShipping\Test\Api\Data\WarehouseInterfaceFactory as WarehouseDataFactory;

class WarehouseRepository implements WarehouseRepositoryInterface
{
    /**
     * @var WarehouseResource
     */
    private $warehouseResource;
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;
    /**
     * @var CustomSearchResultsInterfaceFactory
     */
    private $searchResultsFactory;
    private $warehouseDataFactory;
    private $warehouseFactory;
    public function __construct(
        WarehouseResource $warehouseResource,
        CollectionFactory $collectionFactory,
        WarehouseDataFactory $warehouseDataFactory,
        \MyCustomShipping\Test\Api\Data\WarehouseSearchResultsInterfaceFactory $searchResultsFactory,
        WarehouseFactory $warehouseFactory
    ) {

        $this->warehouseResource = $warehouseResource;
        $this->collectionFactory = $collectionFactory;
        $this->warehouseDataFactory = $warehouseDataFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->warehouseFactory = $warehouseFactory;
    }
    public function save(\MyCustomShipping\Test\Api\Data\WarehouseInterface $warehouse)
    {
        $this->warehouseResource->save($warehouse);
        return $warehouse->getId();
    }
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        /** @var ExampleCollection $collection */
        $collection = $this->warehouseFactory->create()->getCollection();
        /** @var ExampleSearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $this->applySearchCriteriaToCollection($searchCriteria, $collection);
        $warehouses = $this->convertCollectionToDataItemsArray($collection);
        $searchResults->setTotalCount($collection->getSize());
        $searchResults->setItems($warehouses);
        return $searchResults;
    }
}