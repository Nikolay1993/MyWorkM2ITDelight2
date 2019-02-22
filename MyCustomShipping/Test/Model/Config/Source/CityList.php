<?php

namespace MyCustomShipping\Test\Model\Config\Source;

class CityList implements \Magento\Framework\Option\ArrayInterface
{

    public function toOptionArray()
    {
        return [
            [
                'value' => 'Вінниця',
                'label' => 'Вінниця',
            ],
            [
                'value' => 'Дніпро',
                'label' => 'Дніпро',
            ],
            [
                'value' => 'Київ',
                'label' => 'Київ',
            ],
            [
                'value' => 'Львів',
                'label' => 'Львів',
            ],
            [
                'value' => 'Одеса',
                'label' => 'Одеса',
            ],
            [
                'value' => 'Полтава',
                'label' => 'Полтава',
            ],
            [
                'value' => 'Харків',
                'label' => 'Харків',
            ],
        ];
    }
}