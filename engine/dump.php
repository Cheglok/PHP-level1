<?php
$config = [
    'driver' => 'mysql',
    'host' => 'localhost',
    'login' => 'root',
    'password' => '',
    'database' => 'shop',
    'charset' => 'utf8'
];
//Автоматическая загрузка дампа в БД
$db = mysqli_connect("localhost", "$config", "$password", DBNAME);
$result = mysqli_query($db, "SHOW TABLES FROM " . DBNAME . ";");
if (mysqli_num_rows($result) === 0) {
    $dump = file_get_contents("shop.sql");
    $a = 0;
    while ($b = strpos($dump, ";", $a + 1)) {
        $a = substr($dump, $a + 1, $b - $a);
        mysqli_query($db, $a);
        $a = $b;
    }
    echo ("Дамп загружен!");
}