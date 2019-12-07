<?php


namespace app\controllers;

use app\engine\Request;
use app\models\entities\Basket;
use app\models\entities\Order;
use app\models\repositories\BasketRepository;
use app\models\repositories\OrderRepository;

class BasketController extends Controller
{
    public function actionIndex()
    {
        $basket = (new BasketRepository())->getBasket(session_id());
        echo $this->render('basket', ['basket' => $basket]);
    }

    public function actionOrder()
    {
        $basket = (new BasketRepository())->getBasket(session_id());
        echo $this->render('basket', [
                'basket' => $basket,
                'form' => $this->renderTemplate('orderForm', ['session_id' => session_id(), 'basket' => $basket])]
        );
    }

    public function actionProcessOrder()
    {
        $session_id = (new Request)->getParams()['session_id'];
        $tel = (new Request)->getParams()['tel'];
        $email = (new Request)->getParams()['email'];
        $order = new Order($session_id, $tel, $email);
        (new OrderRepository())->save($order);
        session_regenerate_id();
        session_destroy();
        header("Location: /basket");
    }

    public function actionAddToBasket()
    {
        $id = (new Request())->getParams()['id'];

        $basket = new Basket(session_id(), $id);
        (new BasketRepository())->save($basket);

        header('Content-Type: application/json');
        echo json_encode(['responce' => 'ok', 'count' => (new BasketRepository())->getCountWhere('session_id', session_id())]);
    }

    public function actionDeleteFromBasket()
    {
        $id = (new Request())->getParams()['id'];
        $session = session_id();

        $basket = (new BasketRepository())->getOne($id);
        (new BasketRepository())->deleteWhere($basket, 'session_id', $session);
        header('Content-Type: application/json');
        echo json_encode(['responce' => 'deleted', 'count' => (new BasketRepository())->getCountWhere('session_id', session_id())]);
    }
}