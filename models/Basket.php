<?php


namespace app\models;


class Basket extends Model
{
    public $id;
    public $good_id;
    public $session;

    public function getTableName()
    {
        return "basket";
    }
}