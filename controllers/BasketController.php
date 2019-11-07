<?php


namespace app\controllers;

use app\models\Basket;
use app\models\Product;

class BasketController
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;

    public function runAction($action = null) {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo "404 action";
        }
    }

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

    public function render($template, $params = []) {
        if ($this->useLayout) {
            return $this->renderTemplate("layouts/{$this->layout}", [
                'menu' => $this->renderTemplate('menu'),
                'content' => $this->renderTemplate($template, $params)
            ]);
        } else {
            return $this->renderTemplate($template, $params = []);
        }
    }

    public function renderTemplate($template, $params = []) {
        ob_start();
        extract($params);
        $templatePath = TEMPLATES_DIR . $template . ".php";
        if (file_exists($templatePath)) {
            include $templatePath;
        }
        return ob_get_clean();
    }
}