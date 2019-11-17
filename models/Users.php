<?php

namespace app\models;

use app\engine\Db;
use app\engine\Request;
use http\Cookie;

class Users extends DbModel
{
    protected $id;
    protected $login;
    protected $password;
    protected $hash;
    protected $props = [
        'id' => false,
        'name' => false,
        'login' => false,
        'password' => false,
        'hash' => false
    ];

    public function __construct($login = null, $password = null, $hash=null)
    {
        $this->login = $login;
        $this->password = $password;
        $this->hash = $hash;
    }

    public static function getTableName()
    {
        return "users";
    }

    public static function isAuth()
    {
       if (isset($_COOKIE["hash"])) {
           var_dump('authorization by cookie');
           $hash = $_COOKIE["hash"];
           $user = Db::getInstance()->getWhere('hash', $hash);
           if (!empty($user)) {
               $_SESSION['login'] = $user->login;
           }
        }
        return isset($_SESSION['login']);
    }

    public static function auth($login, $pass)
    {
        $user = static::getWhere('login', $login);
        if (password_verify($pass, $user->password)) {
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $user->id;
            return true;
        }
        return false;
    }

    public static function getName()
    {
        return $_SESSION['login'];
    }

    public static function saveUser() {

//        $login = static::getName();
//        $user = static::getWhere('login', $login);
//        $user->hash = uniqid(rand(), true);
//        $user->props['hash'] = true;
//        $user->save();
//        setcookie("hash", $user->hash, time() + 3600);
        //Здесь мы используем заранее написанный общий метод update, но приходится создавать объект user и два раза делать запрос к БД
        //Можно написать отдельный метод


        $hash = uniqid(rand(), true);
        $sql = "UPDATE `users` SET `hash` = :hash WHERE `users`.`id` = :id";
        Db::getInstance()->execute($sql, [':hash'=>$hash, ':id' => $_SESSION['id']]);
        setcookie("hash", $hash, time() + 3600);
    }
}