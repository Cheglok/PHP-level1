<?php

namespace app\models\entities;

use app\models\Model;

class Feedback extends Model
{
    protected $goods_id;
    protected $name;
    protected $feedback;

    public function __construct($goods_id = null, $name = null, $feedback = null)
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