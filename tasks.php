<?php
echo "<br>--------------Задание1 деление на 3--------------<br><br>";

$i = 0;
while ($i <= 100) {
    if ($i % 3 == 0) {
        echo "$i ";
    }
    $i++;
}

echo "<br><br>--------------Задание 2 Чёт-нечёт--------------<br><br>";

$j = 0;
do {
    if ($j == 0) {
        echo "{$j} - ноль.";
    } elseif ($j & 1 == 1) {
        echo "{$j} - нечетное число.<br>";
    } else {
        echo "{$j} - четное число.<br>";
    }
    $j++;
} while ($j <= 10);

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

echo "<br><br>--------------Задание 4 Транслит--------------<br><br>";

$alphabet = [
    'а' => 'a', 'б' => 'b', 'в' => 'v',
    'г' => 'g', 'д' => 'd', 'е' => 'e',
    'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
    'и' => 'i', 'й' => 'y', 'к' => 'k',
    'л' => 'l', 'м' => 'm', 'н' => 'n',
    'о' => 'o', 'п' => 'p', 'р' => 'r',
    'с' => 's', 'т' => 't', 'у' => 'u',
    'ф' => 'f', 'х' => 'h', 'ц' => 'c',
    'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
    'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
    'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
];
$phrase = "Как это ни удивительно, но на первом месте по количеству зубов стоят обычные слизни и улитки.<br>
 Их можно по праву называть одними из самых зубастых существ на планете.";
function translit($phrase, $alphabet)
{
    $newString = "";
    for ($k = 0; $k <= mb_strlen($phrase); $k++) {
        $symbol = mb_substr($phrase, $k, 1);
        $lowSymbol = mb_strtolower($symbol);
        if (!$alphabet[$lowSymbol]) {
            $newString .= $symbol;
        } else if ($lowSymbol == $symbol) {
            $newString .= $alphabet[$symbol];
        } else {
            $newString .= ucfirst($alphabet[$lowSymbol]);
        }
    }
    return $newString;
}

echo translit($phrase, $alphabet);

echo "<br><br>--------------Задание 5 Пробелы--------------<br><br>";

$string = "Белка на болгарском языке звучит как 'Протеин'.";

function airToGround($str)
{
    return str_replace(" ", "_", $str);
}

echo airToGround($string);

//А Вот ещё вариант, с циклом и регуляркой
//function noSpace($string)
//{
//    $arr = preg_split('#(?<!^)(?!$)#u', $string); //
//    for ($i = 0; $i < count($arr); $i++) {
//        if ($arr[$i] == " ") {
//            $arr[$i] = "_";
//        }
//    }
//    return implode($arr);
//}

echo "<br><br>--------------Задание 7 Бестелесный цикл--------------<br><br>";

for ($l = 0; $l < 10; print $l++) {
}

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

echo "<br><br>--------------Задание 9 Блоггерство--------------<br><br>";

$header = "10 рецептов создания убойных хедлайнов!";

function headerToUrl($header, $alphabet)
{
    return airToGround(translit($header, $alphabet));
}

echo headerToUrl($header, $alphabet);