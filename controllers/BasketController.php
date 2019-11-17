<?php


namespace app\controllers;

use app\engine\Request;
use app\models\Basket;

class BasketController extends Controller
{
    public function actionIndex() {
        $basket = Basket::getBasket(session_id());
        echo $this->render('basket', ['basket' => $basket]);
    }
    public function actionOrder() {
        $basket = Basket::getBasket();
        echo $this->render('basket', [
            'basket' => $basket,
                'form' => $this->renderTemplate('orderForm')]
            );
    }

    public function actionAddToBasket() {
        $id = (new Request())->getParams()['id'];
        (new Basket(session_id(), $id)) -> save();

        header('Content-Type: application/json');
        echo json_encode(['responce' => 'ok', 'count' => Basket::getCountWhere('session_id', session_id())]);
    }

    public function actionDeleteFromBasket() {
        $id = (new Request())->getParams()['id'];
        Basket::delete($id);

        header('Content-Type: application/json');
        echo json_encode(['responce' => 'deleted', 'count' => Basket::getCountWhere('session_id', session_id())]);
    }
}