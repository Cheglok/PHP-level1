<?php


namespace app\models\repositories;


use app\models\entities\Users;
use app\models\Repository;

class UserRepository extends Repository
{

    public function getTableName()
    {
        return "users";
    }

    public function getEntityClass()
    {
        return Users::class;
    }

    public function isAuth()
    {
        if (isset($_COOKIE["hash"])) {
            $hash = $_COOKIE["hash"];
            $user = (new UserRepository())->getWhere('hash', $hash);
            if (!empty($user)) {
                $_SESSION['login'] = $user->login;
            }
        }
        return isset($_SESSION['login']);
    }

    public function auth($login, $pass)
    {
        $user = (new UserRepository())->getWhere('login', $login);
        if (password_verify($pass, $user->password)) {
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $user->id;
            return true;
        }
        return false;
    }

    public function getName()
    {
        return $_SESSION['login'];
    }

    public function saveUser() {

        $login = (new UserRepository())->getName();
        $user = (new UserRepository())->getWhere('login', $login);
        $user->hash = uniqid(rand(), true);
        $user->props['hash'] = true;
        (new UserRepository())->save($user);
        setcookie("hash", $user->hash, time() + 3600, "/");
        //Здесь мы используем заранее написанный общий метод update, но приходится создавать объект user и два раза делать запрос к БД

        //Можно написать отдельный метод
//        $hash = uniqid(rand(), true);
//        $sql = "UPDATE `users` SET `hash` = :hash WHERE `users`.`id` = :id";
//        Db::getInstance()->execute($sql, [':hash'=>$hash, ':id' => $_SESSION['id']]);
//        setcookie("hash", $hash, time() + 3600, "/");
    }
}