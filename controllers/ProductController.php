<?php


namespace app\controllers;

use app\models\Product;
use app\engine\Request;

class ProductController extends Controller
{
    public function actionIndex() {
        echo $this->render('index');
    }

    public function actionCatalog()
    {
        $page = (int)(new Request())->getParams()['page'];
        $catalog = Product::getLimit($page);
        echo $this->render('catalog', ['catalog' => $catalog, 'page' => ++$page]);
    }

    public function actionCard() {
        $id = (new Request())->getParams()['id'];
        $product = Product::getOne($id);
        echo $this->render('card', ['product' => $product]);
    }
}