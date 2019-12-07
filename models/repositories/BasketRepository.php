<?php


namespace app\models\repositories;


use app\engine\Db;
use app\models\entities\Basket;
use app\models\Repository;

class BasketRepository extends Repository
{
    public function getTableName()
    {
        return "basket";
    }

    public function getEntityClass()
    {
        return Basket::class;
    }

    public function getBasket($session_id) {
        $sql = "SELECT g.id as good_id, b.id as basket_id, g.name as name, g.image as image FROM `goods` as g, `basket` as b WHERE b.session_id = :sessionId AND b.goods_id = g.id";
        $basket = Db::getInstance()->queryAll($sql, [':sessionId' => $session_id]);
        return $basket;
    }
}