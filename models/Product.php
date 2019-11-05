<?php

namespace app\models;

class Product extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;

    public function __construct($name="prod", $description="desc", $price="1")
    {
        parent::__construct();
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function getTableName()
   {
       return "goods";
   }

    public function GetClass() { //Код дублируется, но не понимаю как вынести в model, там даёт результат Model
        return get_class();
    }

}