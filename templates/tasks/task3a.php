<?php
echo "<br><br>--------------Задание 3 Города--------------<br><br>";

$regions = [
    "Московская область" => ["Москва", "Зеленоград", "Клин"],
    "Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"],
    "Рязанская область" => ["Касимов", "Рязань", "Крутоярский", "Пашма"]
];

foreach ($regions as $region => $cities) {
    echo "{$region}:<br>";
    $cityList = "";
    foreach ($cities as $city) { //Здесь обычный массив с числовыми ключами, так что можно применить и for
        $cityList .= "{$city}, ";
    }
    $cityList = mb_substr($cityList, 0, -2);
    echo "{$cityList}<br>";

    //Вариант с for
//    for ($i = 0; $i <= count($cities); $i++) {
//        echo $cities[$i];
//        if ($i + 1 < count($cities)) {
//            echo ", ";
//        } else {
//            echo "<br>";
//        }
//    }
}