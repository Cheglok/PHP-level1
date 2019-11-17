<?php


namespace app\controllers;

use app\engine\Request;
use app\models\Users;


class UserController extends Controller
{
    public function actionLogin()
    {
        $login = (new Request())->getParams()['login'];
        $pass = (new Request())->getParams()['pass'];
        if (!Users::auth($login, $pass)) {
            Die("Логин или пароль не верный!");
        } else {
            if (isset((new Request())->getParams()['save'])) {
                header("Location: /user/save");
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
        session_destroy();
        setcookie("hash");
        header("Location: /");
        exit();
    }

    public function actionSave() {
        Users::saveUser();
        header("Location: /");
    }
}