<?php
define("DBNAME", "php");
$db = @mysqli_connect("localhost", "root", "", DBNAME) or die("Error " . mysqli_connect_error($db));
//Эту функцию достаточно применить один раз
//fillDB($db, IMAGES_DIR);

//Автоматическая загрузка дампа в БД
$result = mysqli_query($db, "SHOW TABLES FROM php;");
var_dump(mysqli_num_rows($result));
if (mysqli_num_rows($result) === 0) {
    $dump = file_get_contents("gallerylist.sql");
    var_dump($dump);

    $a = 0;
    while ($b = strpos($dump, ";", $a + 1)) {
        $a = substr($dump, $a + 1, $b - $a);
        mysqli_query($db, $a);
        $a = $b;
    }
    var_dump("Дамп загружен!");
}
$result = @mysqli_query($db, "SELECT * FROM `gallerylist` WHERE 1");
