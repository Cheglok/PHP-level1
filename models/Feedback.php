<?php


namespace app\models;


class Feedback extends Model
{
    public $id;
    public $goods_id;
    public $name;
    public $feedback;

    public function __construct($goods_id, $name, $feedback)
    {
        parent::__construct();
        $this->goods_id = $goods_id;
        $this->name = $name;
        $this->feedback = $feedback;
    }


    public function getTableName()
    {
        return "feedback";
    }
    public function GetClass() {//Код дублируется, но не понимаю как вынести в model, там даёт результат Model
        return get_class();
    }
}