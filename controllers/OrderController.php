<?php

namespace app\controllers;

use app\engine\App;

class OrderController extends Controller
{
    public function actionIndex()
    {
        $order = App::call()->ordersRepository->getAll();
        echo $this->render('order', ['order' => $order, 'name' => App::call()->usersRepository->getName()]);
    }

    public function actionOrderChange()
    {
        $id = App::call()->request->getParams()['id'];
        $status = App::call()->request->getParams()['status'];
        $order = App::call()->ordersRepository->getOne($id);
        $order->status = $status;
        App::call()->ordersRepository->save($order);
        header("Location: /order");
    }

    public function actionShowOrder()
    {
        $session_id = App::call()->request->getParams()['session_id'];
        $id = App::call()->request->getParams()['id'];
        $basket = App::call()->basketRepository->getBasket($session_id);
        echo $this->render('userOrder', ['basket' => $basket, 'id' => $id]);
    }

    public function actionMyOrder()
    {
        echo "Здесь должны быть заказы пользователей, но это не работает, пока корзины создаются по сессии";
        echo "<a href=\"/\">Главная</a>";
    }
}