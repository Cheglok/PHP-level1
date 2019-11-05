<?php

use app\models\{Basket, Product, Users, Feedback, Orders};
use app\engine\{Autoload, Db};

include realpath("../config/config.php");
include realpath("../engine/Autoload.php");


spl_autoload_register([new Autoload(), 'loadClass']);


$product = new Product("Пицца", "Описание", 125);
$product->insert(); //Так осуществляется вставка
//var_dump($product);

//$product->insert(); //Так можно сразу вставить и удалить, в разных запусках нельзя, т.к. id не передать между запусками
//var_dump($product);
//$product->delete(); //Изменения видны по id
//var_dump($product);

//$product = $product->getOne(86);
//var_dump($product); //Извлекаем одну запись из БД с ручным заданием id
//$product->delete(); //Можно сразу выполнить удаление
//var_dump($product);

//$product->getOne(83)->delete(); // Можно выполнить удаление в одну строчку с ручным заданием id
//var_dump($product);



