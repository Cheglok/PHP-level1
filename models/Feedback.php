<?php


namespace app\models;


class Feedback extends Model
{
    public $id;
    public $good_id;
    public $name;
    public $feedback;

    public function getTableName()
    {
        return "feedback";
    }
}