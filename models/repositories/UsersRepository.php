<?php

namespace app\models\repositories;

use app\engine\App;
use app\models\entities\Users;
use app\models\Repository;

class UsersRepository extends Repository
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
            $user = App::call()->usersRepository->getWhere('hash', $hash);
            if (!empty($user)) {
                $_SESSION['login'] = $user->login;
            }
        }
        return isset($_SESSION['login']);
    }

    public function auth($login, $pass)
    {
        $user = App::call()->usersRepository->getWhere('login', $login);
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

    public function saveUser()
    {

        $login = App::call()->usersRepository->getName();
        $user = App::call()->usersRepository->getWhere('login', $login);
        $user->hash = uniqid(rand(), true);
        $user->props['hash'] = true;
        App::call()->usersRepository->save($user);
        setcookie("hash", $user->hash, time() + 3600, "/");
    }
}