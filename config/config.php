<?php
use app\engine\Request;
use app\models\repositories\BasketRepository;
use app\models\repositories\ProductRepository;
use app\models\repositories\UsersRepository;
use app\models\repositories\OrdersRepository;
use app\engine\Db;

return [
    'root_dir' => dirname(__DIR__),
    'templates_dir' => dirname(__DIR__) . "/templates/",
    'controllers_namespaces' => "app\\controllers\\",
    'components' => [
        'db' => [
            'class' => Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => '',
            'database' => 'php1',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => Request::class
        ],
        'basketRepository' => [
            'class' => BasketRepository::class
        ],
        'productRepository' => [
            'class' => ProductRepository::class
        ],
        'usersRepository' => [
            'class' => UsersRepository::class
        ],
        'ordersRepository' => [
            'class' => OrdersRepository::class
        ]
    ]
];