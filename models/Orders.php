<?php


namespace app\models;


class Orders extends Model
{
    public $id;
    public $session_id;
    public $tel;
    public $email;

    public function __construct($session_id, $tel, $email)
    {
        parent::__construct();
        $this->session_id = $session_id;
        $this->tel = $tel;
        $this->email = $email;
    }

    public function getTableName()
    {
        return "orders";
    }
    public function GetClass() {//Код дублируется, но не понимаю как вынести в model, там даёт результат Model
        return get_class();
    }
}