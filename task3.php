<?php

abstract class Item
{
    public $price;
    protected $profit = 20;

    public function __construct(float $price)
    {
        $this->price = $price;
    }

    abstract public function getCost();

    public function getMargin()
    {
        $margin = $this->getCost() * $this->profit / 100;
        return $margin;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getProfit(): int
    {
        return $this->profit;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function setProfit(float $profit): void
    {
        $this->profit = $profit;
    }

    public function AboutYou(float $amount) {
        $result = "Класс: " . static::class
            . "<br>Цена: {$this->getPrice()}, Норма прибыли: {$this->getProfit()}% Количество: {$amount},<br>
            Общая стоимость товара: {$this->getCost()}, Суммарная выручка: {$this->getMargin()}<br>";
        return $result;
    }
}

class DigitalItem extends Item
{
    public $pieces;

    public function __construct(float $price, int $pieces)
    {
        parent::__construct($price);
        $this->pieces = $pieces;
    }

    function getCost() {
        $cost = $this->price * $this->pieces;
        return $cost;
    }

    function tellAboutYou() {
        $amount = $this->pieces;
        return parent::AboutYou($amount);
    }

    public function getPieces()
    {
        return $this->pieces;
    }

    public function setPieces(int $pieces)
    {
        $this->pieces = $pieces;
    }


}

class MaterialItem extends DigitalItem
    //Можно объявить их наследниками, т.к. цифровой товар - это продукт человеческого сознания,
    // а вещественный - тоже сначала был придуман, а потом получил материальное воплощение.
{
    public function __construct(float $price, int $pieces)
    {
        parent::__construct($price, $pieces);
        $this->price = $price * 2;
    }
}

class WeightItem extends Item
{
    public $weight;

    public function __construct(float $price, float $weight)
    {
        parent::__construct($price);
        $this->weight = $weight;
    }

    function getCost()
    {
        $cost = $this->price * $this->weight;
        return $cost;
    }

    function tellAboutYou() {
        $amount = $this->weight;
        return parent::AboutYou($amount);
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight(float $weight)
    {
        $this->weight = $weight;
    }

}

$digitalItem = new DigitalItem(100, 20);
echo $digitalItem->tellAboutYou() . "<br>";

$pieceItem = new MaterialItem(100, 20);
echo $pieceItem->tellAboutYou() . "<br>";

$weightItem = new WeightItem(300, 14.3);
echo $weightItem->tellAboutYou() . "<br>";
