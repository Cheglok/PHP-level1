<?php


namespace app\controllers;

use app\engine\Request;
use app\models\repositories\UserRepository;
use app\models\Users;


class UserController extends Controller
{
    public function actionLogin()
    {
        $login = (new Request())->getParams()['login'];
        $pass = (new Request())->getParams()['pass'];
        if (!(New UserRepository())->auth($login, $pass)) {
            Die("Логин или пароль не верный!");
        } else {
            if (isset((new Request())->getParams()['save'])) {
                (new UserRepository())->saveUser();
                header("Location: /");
                exit();
            }
            else {
                header("Location: /");
                exit();
            }
        }
    }

    public function actionLogout()
    {
        session_regenerate_id();
        session_destroy();
        setcookie("hash", '', time() -3600, '/');
        header("Location: /");
        exit();
    }
}