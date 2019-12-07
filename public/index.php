<?php
session_start();

use app\models\{Basket, Product, Users, Feedback, Orders};
use app\engine\{Autoload, Db, Render, TwigRender, Request};

try {
    include realpath("../config/config.php");
//    include realpath("../engine/Autoload.php");
    include realpath('../vendor/autoload.php');

    spl_autoload_register([new Autoload(), 'loadClass']);

    $request = new Request();

    $controllerName = $request->getControllerName() ?: 'product';
    $actionName = $request->getActionName();

    $controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

    if (class_exists($controllerClass)) {
        $controller = new $controllerClass(new Render());
//    $controller = new $controllerClass(new TwigRender());
        $controller->runAction($actionName);
    } else {
        echo "404 controller";
    }
} catch (\PDOException $e) {
    var_dump($e);
} catch (\Exception $e) {
    var_dump($e);
};