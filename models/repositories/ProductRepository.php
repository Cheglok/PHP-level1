<?php


namespace app\models\repositories;


use app\models\entities\Product;
use app\models\Repository;

class ProductRepository extends Repository
{
    public function getTableName()
    {
        return "goods";
    }

    public function getEntityClass()
    {
        return Product::class;
    }
}