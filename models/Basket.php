<?php
namespace app\models;

use app\engine\Db;

class Basket extends DbModel
{
    public $goods_id;
    public $session_id;
    protected $props = [
        'goods_id' =>false,
        'session_id' =>false
    ];

    public function __construct($session_id=null, $goods_id=null)
    {
        $this->goods_id = $goods_id;
        $this->session_id = $session_id;
    }

    public static function getTableName()
    {
        return "basket";
    }

    public function getBasket($session_id) {
        $sql = "SELECT g.id as good_id, b.id as basket_id, g.name as name, g.image as image FROM `goods` as g, `basket` as b WHERE b.session_id = :sessionId AND b.goods_id = g.id";
        $basket = Db::getInstance()->queryAll($sql, [':sessionId' => $session_id]);
        return $basket;
    }
}