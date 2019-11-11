<?php


namespace app\controllers;

use app\models\Basket;

class BasketController extends Controller
{
    public function actionIndex() {
        $basket = Basket::getBasket();
        echo $this->render('basket', ['basket' => $basket]);
    }
    public function actionOrder() {
        $basket = Basket::getBasket();
        echo $this->render('basket', [
            'basket' => $basket,
                'form' => $this->renderTemplate('orderForm')]
            );
    }
}