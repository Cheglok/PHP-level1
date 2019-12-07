<?php

use app\models\entities\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    protected $fixture;
    //Получились 4 одинаковых метода, в каждом из которых можно проверить только одно из свойств объекта
    //При этом не получится использовать принадлежность, ведь тестируем функцию-конструктор объекта
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

    protected function setUp()
    {
        $this->fixture = get_class(new Product());
    }
    protected function tearDown()
    {
        $this->fixture = NULL;
    }


    public function testNamespaceGlobal() {
        $this->assertEquals(0, strpos($this->fixture, "app\\"));
    }

    public function testNamespaceFolder() {
        $this->assertEquals(['models'], array_slice(explode("\\", $this->fixture), 1, 1));
    }

    public function testNamespaceLength() {
        $this->assertEquals(3, substr_count($this->fixture, "\\" ));
    }
}