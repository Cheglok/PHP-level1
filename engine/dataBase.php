<?php

$db = @mysqli_connect("localhost", "php-level1", "qwerty", "php-level1") or die("Error " . mysqli_connect_error($db));
//Эту функцию достаточно применить один раз
//fillDB($db, IMAGES_DIR);
$result = @mysqli_query($db, "SELECT * FROM `gallerylist` WHERE 1");
