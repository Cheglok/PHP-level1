<?php
namespace app\models;


class Basket extends Model
{
    public $id;
    public $goods_id;
    public $session_id;

    public function __construct($goods_id, $session_id)
    {
        parent::__construct();
        $this->goods_id = $goods_id;
        $this->session_id = $session_id;
    }

    public function getTableName()
    {
        return "basket";
    }
    public function GetClass() {//Код дублируется, но не понимаю как вынести в model, там даёт результат Model
        return get_class();
    }
}