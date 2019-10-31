<?php

use app\models\{Product, Users, Basket, Orders, Feedback};
use app\engine\Db;
use app\interfaces\IModels;

include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Product(new Db());
$users = new Users(new Db());
$basket = new Basket(new Db());
$orders = new Orders(new Db());
$feedback = new Feedback(new Db());

function foo(IModels $model) {
    return $model->getTableName();
}

echo foo($product);
echo $product->getOne(1);

echo foo($users);
echo $users->getOne(1);

echo foo($basket);
echo $basket->getOne(1);

echo foo($orders);
echo $orders->getAll(1);

echo foo($feedback);
echo $feedback->getOne(1);


