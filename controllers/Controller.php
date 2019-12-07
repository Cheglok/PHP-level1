<?php


namespace app\controllers;

use app\interfaces\IRenderer;
use app\models\entities\Basket;
use app\models\entities\Users;
use app\models\repositories\BasketRepository;
use app\models\repositories\OrderRepository;
use app\models\repositories\UserRepository;

class Controller implements IRenderer
{
    protected $action;
    protected $defaultAction = 'index';
    protected $layout = 'main';
    protected $useLayout = true;
    private $renderer;

    /**
     * Controller constructor.
     * @param $renderer
     */
    public function __construct(IRenderer $renderer)
    {
        $this->renderer = $renderer;
    }


    public function runAction($action = null) {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo "404 action";
        }
    }

    public function render($template, $params = []) {
        if ($this->useLayout) {
            return $this->renderTemplate("layouts/{$this->layout}", [
                'menu' => $this->renderTemplate('menu', [
                    'count' => (new BasketRepository())->getCountWhere('session_id', session_id()),
                    'auth' => (new UserRepository())->isAuth(),
                    'ordersCount' => (new OrderRepository())->getCountWhere('session_id', session_id())
                ]),
                'content' => $this->renderTemplate($template, $params),
                'authorization' => $this->renderTemplate('authorization', [
                    'auth' => (new UserRepository())->isAuth(),
                    'userName' => (new UserRepository())->getName()
                    ])
            ]);
        } else {
            return $this->renderTemplate($template, $params = []);
        }
    }

    public function renderTemplate($template, $params = []) {
        return $this->renderer->renderTemplate($template, $params);
    }





}