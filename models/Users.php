<?php

namespace app\models;

class Users extends DbModel
{
    public $id;
    public $name;
    public $login;
    public $password;
    protected $props = [
        'id' => false,
        'name' => false,
        'login' => false,
        'password' => false,
    ];

    public function __construct($name = null, $login = null, $password = null)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }

    public static function getTableName()
    {
        return "users";
    }

    public static function isAuth()
    {
        return isset($_SESSION['login']) ? true : false;
    }

    public static function auth($login, $pass)
    {
        $user = static::getWhere('login', $login);
        if ($pass == $user->password) {
            //если пароль верный, введенный == паролю в бд создаем сессию
            $_SESSION['login'] = $login;
            return true;
        }
        return false;
    }

    public static function getName()
    {
        return $_SESSION['login'];
    }

}