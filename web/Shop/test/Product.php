<?php

class Product
{

    public $productArray = array(
        "Book0" => array(
            'id' => '1',
            'name' => 'Book of Mormon',
            'code' => 'Book0',
            'image' => 'https://latterdaysaintmag.com/wp-content/uploads/2020/01/book2-768x448.png',
            'price' => '1.00'
        ),
        "USB02" => array(
            'id' => '2',
            'name' => 'External Hard Drive',
            'code' => 'USB02',
            'image' => 'product-images/external-hard-drive.jpg',
            'price' => '800.00'
        ),
        "wristWear03" => array(
            'id' => '3',
            'name' => 'Wrist Watch',
            'code' => 'wristWear03',
            'image' => 'product-images/watch.jpg',
            'price' => '300.00'
        )
    );

    public function getAllProduct()
    {
        return $this->productArray;
    }
}
