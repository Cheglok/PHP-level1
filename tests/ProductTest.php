<?php

use app\models\entities\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testProduct()
    {
        $name = "Чай";
        $product = new Product();
        $this->assertEquals($name, $product->name);
    }
}