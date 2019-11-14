<?php


namespace app\controllers;

use app\models\Users;


class UserController extends Controller
{
    public function actionLogin()
    {
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        if (!Users::auth($login, $pass)) {
            Die("Логин или пароль не верный!");
        } else {
            header("Location: /");
            exit();
        }
    }

    public function actionLogout()
    {
        session_destroy();
        header("Location: /");
        exit();
    }
}