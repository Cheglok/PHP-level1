<?php

namespace app\controllers;

use app\engine\App;

class UserController extends Controller
{
    public function actionLogin()
    {
        $login = App::call()->request->getParams()['login'];
        $pass = App::call()->request->getParams()['pass'];
        if (!App::call()->usersRepository->auth($login, $pass)) {
            Die("Логин или пароль не верный!");
        } else {
            if (isset(App::call()->request->getParams()['save'])) {
                App::call()->usersRepository->saveUser();
                header("Location: /");
                exit();
            } else {
                header("Location: /");
                exit();
            }
        }
    }

    public function actionLogout()
    {
        session_regenerate_id();
        session_destroy();
        setcookie("hash", '', time() - 3600, '/');
        header("Location: /");
        exit();
    }
}