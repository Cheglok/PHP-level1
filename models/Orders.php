<?php


namespace app\models;


class Orders extends Model
{
    public $id;
    public $session;
    public $tel;
    public $email;

    public function getTableName()
    {
        return "orders";
    }
}