<?php

use app\models\entities\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * @dataProvider providerProduct
     */
    public function testProductName($name, $description, $price, $image)
    {
        $product = new Product($name, $description, $price, $image);
       $this->assertEquals($name, $product->name);
    }

    /**
     * @dataProvider providerProduct
     */
    public function testProductDescription($name, $description, $price, $image)
    {
        $product = new Product($name, $description, $price, $image);
        $this->assertEquals($description, $product->description);
    }

    /**
     * @dataProvider providerProduct
     */
    public function testProductPrice($name, $description, $price, $image)
    {
        $product = new Product($name, $description, $price, $image);
        $this->assertEquals($price, $product->price);
    }

    /**
     * @dataProvider providerProduct
     */
    public function testProductImage($name, $description, $price, $image)
    {
        $product = new Product($name, $description, $price, $image);
        $this->assertEquals($image, $product->image);
    }

    public function providerProduct() {
        return array (
            array ('pizza', 'good taste', '12', 'AETHWY_RELYING_ON_YOU.jpeg'),
            array ('123', '123', '12.123', '   '),
            array ('@#@$$@', '325$@!$', '12', '/dsgsdg/dsf')
        );
    }

    public function testNamespaceGlobal() {
        $this->assertEquals(0, strpos(Product::class, "app\\"));
    }

    public function testNamespaceFolder() {
        $this->assertEquals(['models'], array_slice(explode("\\", get_class(new Product())), 1, 1));
    }

    public function testNamespaceLength() {
        $this->assertEquals(3, substr_count(Product::class, "\\" ));
    }
}