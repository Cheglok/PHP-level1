<?php

namespace app\models;

class Users extends DbModel
{
    public $id;
    public $name;
    public $login;
    public $password;

    public function __construct($name=null, $login=null, $password=null)
    {
        parent::__construct();
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }

    public static function getTableName()
    {
        return "users";
    }

}