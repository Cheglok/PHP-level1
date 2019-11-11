<?php

use app\models\{Basket, Product, Users, Feedback, Orders};
use app\engine\{Autoload, Db, Render};

include realpath("../config/config.php");
include realpath("../engine/Autoload.php");

spl_autoload_register([new Autoload(), 'loadClass']);

$url = explode('/', $_SERVER['REQUEST_URI']);

$controllerName = empty($url[1])? 'product' : $url[1];
$actionName = $url[2];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new Render());
    $controller->runAction($actionName);
} else {
    echo "404 controller";
}
