<?php

namespace app\models;

class Product extends DbModel
{
    protected $name;
    protected $description;
    protected $price;
    protected $image;

    public function __construct($name=null, $description=null, $price=null, $image=null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
    }

    public static function getTableName()
   {
       return "goods";
   }

}