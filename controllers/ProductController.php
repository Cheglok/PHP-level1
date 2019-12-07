<?php


namespace app\controllers;

use app\controllers\Controller;
use app\engine\Request;
use app\models\repositories\ProductRepository;

class ProductController extends Controller
{
    public function actionIndex() {
        echo $this->render('index');
    }

    public function actionCatalog()
    {
        $page = (int)(new Request())->getParams()['page'];
        $catalog = (new ProductRepository())->getLimit($page);
        echo $this->render('catalog', ['catalog' => $catalog, 'page' => ++$page]);
    }

    public function actionCard() {
        $id = (new Request())->getParams()['id'];
        $product = (new ProductRepository())->getOne($id);
        echo $this->render('card', ['product' => $product, 'id' => $id]);
    }
}