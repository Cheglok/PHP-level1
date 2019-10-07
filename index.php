<?php
define('TEMPLATES_DIR', './templates/');
define('LAYOUTS_DIR', 'layouts/');


if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}

$links = [
    [
        'title' => 'Главная',
        'link' => '/'
    ],
    [
        'title' => 'Каталог',
        'link' => '/?page=catalog'
    ],
    [
        'title' => 'Работа функций ДЗ',
        'link' => '/?page=tasks'
    ],
    'Отдельные задания' => [
        [
            'title' => 'Задание1',
            'link' => '/?page=tasks/task1',

        ],
        [
            'title' => 'Задание2',
            'link' => '/?page=tasks/task2'
        ],
        'Варианты задания3' => [
            [
                'title' => 'Задание3 вариант А, foreach',
                'link' => '/?page=tasks/task3a',
            ],
            [
                'title' => 'Задание1 вариант Б for',
                'link' => '/?page=tasks/task3b',
            ]
        ],
        [
            'title' => 'Задание4',
            'link' => '/?page=tasks/task4'
        ],
        [
            'title' => 'Задание5',
            'link' => '/?page=tasks/task5'
        ],
        [
            'title' => 'Задание7',
            'link' => '/?page=tasks/task7'
        ],
        [
            'title' => 'Задание8',
            'link' => '/?page=tasks/task8'
        ],
        [
            'title' => 'Задание9',
            'link' => '/?page=tasks/task9'
        ],
    ],
];

$params = ['login' => 'admin', 'links' => $links];
switch ($page) {
    case 'index':
        $params['name'] = 'Клен';
        break;
    case 'catalog':
        $params['catalog'] = [
            [
                'name' => 'Пицца',
                'price' => 24
            ],
            [
                'name' => 'Чай',
                'price' => 1
            ],
            [
                'name' => 'Яблоко',
                'price' => 12
            ],
        ];
        break;

    case 'apicatalog':
        $params['catalog'] = [
            [
                'name' => 'Пицца',
                'price' => 24
            ],

            [
                'name' => 'Яблоко',
                'price' => 12
            ],
        ];

        echo json_encode($params, JSON_UNESCAPED_UNICODE);
        exit;
        break;

}

echo render($page, $params);


function render($page, $params = [])
{
    return renderTemplate(LAYOUTS_DIR . 'main', [
            'content' => renderTemplate($page, $params),
            'menu' => renderTemplate('menu', $params)
        ]
    );
}


function renderTemplate($page, $params = [])
{
    ob_start();

    if (!is_null($params))
        extract($params);

    $fileName = TEMPLATES_DIR . $page . ".php";

    if (file_exists($fileName)) {
        include $fileName;
    } else {
        Die("Такой страницы не существует. 404");
    }

    return ob_get_clean();
}

function makeMenu($links)
{
    ob_start();
    echo "<ul>";
    foreach ($links as $key => $value) {
        if (is_array($value) && array_key_exists('link', $value)) {
            echo "<li><a href=\"{$value['link']}\">{$value['title']}</a></li>";
        } else if (is_array($value)) {
            echo "<h4>{$key}</h4>";
            echo makeMenu($value);
        } else {
            continue;
        }
    }
    echo "</ul>";
    return ob_get_clean();
}