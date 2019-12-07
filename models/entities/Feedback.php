<?php


namespace app\models;


class Feedback extends DbModel
{
    protected $goods_id;
    protected $name;
    protected $feedback;

    public function __construct($goods_id=null, $name=null, $feedback=null)
    {
        parent::__construct();
        $this->goods_id = $goods_id;
        $this->name = $name;
        $this->feedback = $feedback;
    }


    public static function getTableName()
    {
        return "feedback";
    }

}