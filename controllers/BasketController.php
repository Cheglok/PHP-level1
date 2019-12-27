<?php

namespace app\controllers;

use app\engine\App;
use app\models\entities\Basket;
use app\models\entities\Order;

class BasketController extends Controller
{
    public function actionIndex()
    {
        $basket = App::call()->basketRepository->getBasket(session_id());
        echo $this->render('basket', ['basket' => $basket]);
    }

    public function actionOrder()
    {
        $basket = App::call()->basketRepository->getBasket(session_id());
        echo $this->render('basket', [
                'basket' => $basket,
                'form' => $this->renderTemplate('orderForm', ['session_id' => session_id(), 'basket' => $basket])]
        );
    }

    public function actionProcessOrder()
    {
        $session_id = App::call()->request->getParams()['session_id'];
        $tel = App::call()->request->getParams()['tel'];
        $email = App::call()->request->getParams()['email'];
        $order = new Order($session_id, $tel, $email);
        App::call()->ordersRepository->save($order);
        session_regenerate_id();
        header("Location: /basket/basketDone");
    }

    public function actionAddToBasket()
    {
        $id = App::call()->request->getParams()['id'];

        $basket = new Basket(session_id(), $id);
        App::call()->basketRepository->save($basket);

        header('Content-Type: application/json');
        echo json_encode([
            'response' => 'Товар добавлен',
            'count' => App::call()->basketRepository->getCountWhere('session_id', session_id())
        ]);
    }

    public function actionDeleteFromBasket()
    {
        $id = App::call()->request->getParams()['id'];
        $session = session_id();
        $basket = App::call()->basketRepository->getOne($id);
        App::call()->basketRepository->deleteWhere($basket, 'session_id', $session);
        header('Content-Type: application/json');
        echo json_encode([
            'response' => 'Товар удалён',
            'count' => App::call()->basketRepository->getCountWhere('session_id', session_id())
        ]);
    }

    public function actionBasketDone()
    {
        echo $this->render('basketDone');
    }
}