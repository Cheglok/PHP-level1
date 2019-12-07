<?php

namespace app\models\entities;

use app\engine\Db;
use app\models\Model;

class Product extends Model
{
    protected $name;
    protected $description;
    protected $price;
    protected $image;
    protected $props = [
        'name' =>false,
        'description' =>false,
        'price' =>false,
        'image' =>false,
    ];

    public function __construct($name=null, $description=null, $price=null, $image=null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
    }

}