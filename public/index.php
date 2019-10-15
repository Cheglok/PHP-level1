<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";


if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}
if (isset($_GET['image'])) {
    $image = $_GET['image'];
}
_log($page);
$params = ['login' => 'admin', 'menuList' => makeMenu($links), 'headInfo' => '', 'image' => $image, 'db' => $db];
switch ($page) {
    case 'index':
        $params['name'] = 'Клен';
        _log($params);
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

    case 'gallery':
        $params['imagesList'] = array_splice(scandir(PREVIEWS_DIR), 2);
        $params['headInfo'] = $galleryHeadInfo;
        $params['result'] = $result;



}

echo render($page, $params);



