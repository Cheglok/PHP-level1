<?php


namespace app\models;


class Orders extends DbModel
{
    public $session_id;
    public $tel;
    public $email;

    public function __construct($session_id=null, $tel=null, $email=null)
    {
        parent::__construct();
        $this->session_id = $session_id;
        $this->tel = $tel;
        $this->email = $email;
    }

    public static function getTableName()
    {
        return "orders";
    }

}