<?php

namespace MyCustomShipping\Test\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface WarehouseRepositoryInterface
{

    public function save(Data\WarehouseInterface $request);

    public function getList(SearchCriteriaInterface $searchCriteria);

}
