<?php


namespace app\models\entities;

use app\models\Model;


class Orders extends Model
{
    protected $session_id;
    protected $tel;
    protected $email;

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