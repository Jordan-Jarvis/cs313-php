<?php

class Product
{

    public $productArray = array(
        "Book0" => array(
            'id' => '1',
            'name' => 'Book of Mormon',
            'code' => 'Book0',
            'price' => '1.00'
        ),
        "USB02" => array(
            'id' => '2',
            'name' => 'External Hard Drive',
            'code' => 'USB02',
            'price' => '800.00'
        ),
        "wristWear03" => array(
            'id' => '3',
            'name' => 'Wrist Watch',
            'code' => 'wristWear03',
            'price' => '300.00'
        )
    );
    public function getAllProduct()
    {
        return $this->productArray;
    }
}
