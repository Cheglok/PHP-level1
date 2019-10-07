<?php
$regions = [
    "Московская область" => ["Москва", "Зеленоград", "Клин"],
    "Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"],
    "Рязанская область" => ["Касимов", "Рязань", "Крутоярский", "Пашма"]
];

echo "<br><br>--------------Задание 8 Города на букву К--------------<br><br>";

foreach ($regions as $region => $cities) {
    echo "{$region}:<br>";
    $cityList = "";
    foreach ($cities as $city) {
        if (mb_substr($city, 0, 1) == "К") {
            $cityList .= "{$city}, ";
        }
    }
    $cityList = mb_substr($cityList, 0, -2);
    echo "$cityList<br>";
}