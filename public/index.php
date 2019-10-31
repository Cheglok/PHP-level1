<?php

use app\models\{Product, Users};
use app\engine\Db;
use app\interfaces\IModels;

include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Product(new Db());
$users = new Users(new Db());

function foo(IModels $model) {
    return $model->getTableName();
}

echo foo($product);

//echo $product->getOne(1);


