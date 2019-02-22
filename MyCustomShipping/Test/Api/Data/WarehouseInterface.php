<?php

/**
 * warehouse interface
 */

namespace MyCustomShipping\Test\Api\Data;

interface WarehouseInterface
{

    public function setCityId($city_id);

    public function setName($warehouse_name);

    public function setNameRu($warehouse_name_ru);

    public function setRef($warehouse_name_ru);
}
