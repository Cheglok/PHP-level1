<?php
namespace app\models;

use app\engine\Db;

class Basket extends DbModel
{
    public $goods_id;
    public $session_id;

    public function __construct($goods_id=null, $session_id=null)
    {
        $this->goods_id = $goods_id;
        $this->session_id = $session_id;
    }

    public static function getTableName()
    {
        return "basket";
    }

    public function getBasket() {
        $className = static::class;
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}`"; //Здесь надо сложный sql запрос, собирающий данные с нескольких таблиц, я пока так не умею
        $basket = Db::getInstance()->queryAll($sql, $params=[]);
        return $basket;
    }
}