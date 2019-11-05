<?php

namespace app\models;

class Users extends Model
{
    public $id;
    public $name;
    public $login;
    public $password;

    public function __construct($name, $login, $password)
    {
        parent::__construct();
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }

    public function getTableName()
    {
        return "users";
    }
    public function GetClass() {//Код дублируется, но не понимаю как вынести в model, там даёт результат Model
        return get_class();
    }
}