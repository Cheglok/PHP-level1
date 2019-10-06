<?php
echo "Задание 1<br>";
$i = 0;
while (100 >= $i) {
    if (!($i%3)) echo "$i ";
    $i++;
}

echo "<br><br>Задание 2<br>";

$j = 0;
do {        //вариант со switch. ниже вариант с if/else
    switch ($j) {
        case 0:
            echo "$j - ноль";
            break;
        default:
            if ($j % 2) echo "$j - нечетное число";
            else echo "$j - чётное число";
    }
    echo "<br>";
    $j++;

//    if ($j == 0) {
//        echo "$j - ноль<br>";
//    } elseif ($j % 2) {
//        echo "$j - нечетное число<br>";
//    } else {
//        echo "$j - чётное число<br>";
//    }
//    $j++;
} while ($j <= 10);

echo "<br><br>Задание 3<br>";
$towns = ["Московская область" => ["Москва", "Зеленоград", "Клин"],
    "Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"],
    "Рязанская область" => ["Кораблино", "Ряжск", "Кадом", "Рязань"],
];
foreach ($towns as $key => $value) { //Ассоциативный массив - применяем foreach
    echo "$key:<br>";
    $region = $towns[$key]; //Введение этой переменной - для лучшей читаемости кода
    for ($i = 0; $i <= count($region); $i++) { //Обычный массив, цикл for
        echo $region[$i];
        if ($i + 1 < count($region)) {
            echo ", ";
        } else {
            echo "<br>";
        }
    }
}

echo "<br><br>Задание 4 Na Angliiskom<br>";

$alfabet = [
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

function translit($string, $alphabet)
{
    ob_start();
    $arr = preg_split('#(?<!^)(?!$)#u', $string); //Разобъём строку на символы и запишем во временный массив
    for ($i = 0; $i < count($arr); $i++) {               //Переберём все значения временного массива(далее символы)
        $symbol = $arr[$i];
        if (mb_strtolower($symbol) == $symbol) {      //сравним символ с самим собой в нижнем регистре
            if (array_key_exists($symbol, $alphabet)) { //используем символ в качестве ключа для массива-словаря
                echo $alphabet[$symbol];               //Ключ есть - выведем значение
            } else echo $symbol;                       //Ключа нет - выведем сам символ без изменений
            //-------------------------------------ИНАЧЕ--------------------------------------
        } else {                                     // Значит данный символ - в верхнем регистре
            $symbol = mb_strtolower($symbol);       //Переведём его в нижний и используем как ключ к словарю
            echo ucfirst($alphabet[$symbol]);       //Выведем значение из словаря, переведя первый символ в
        }                                           // верхний регистр
    }
    return ob_get_clean();
}

echo translit("КАК ДелааА? Чувак, эТо ПрЯямо ШЫЗЗа +=%", $alfabet);

echo "<br><br>Задание 5 Просто добавь земли<br>";

function noSpace($string)
{
    $arr = preg_split('#(?<!^)(?!$)#u', $string); // Я не понимаю как работает эта функция, просто нагуглил
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] == " ") {
            $arr[$i] = "_";
        }
    }
    return implode($arr);
}

echo noSpace("Слишком много воды");

echo "<br><br>Задание 7 Бестелесный цикл<br>";

/** @noinspection PhpStatementHasEmptyBodyInspection */
for ($k = 0; $k <= 9; print $k, $k++) {
}

echo "<br><br>Задание 8 Города на букву<br>";
$towns = ["Московская область" => ["Москва", "Зеленоград", "Клин"],
    "Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"],
    "Рязанская область" => ["Кораблино", "Ряжск", "Кадом", "Рязань"],
];
//foreach ($towns as $key => $value) { //Это первое решение
//    echo "$key:<br>";
//    $i = 0;
//    $K_Town = 0; // Это счётчик выведенных городок на букву K
//    do {
//        $town = $towns[$key][$i];
//        if (mb_substr($town, 0, 1, 'UTF8') == "К") {
//            if ($K_Town > 0) echo ", ";
//            $K_Town++;
//            echo $town;
//        }
//        if ($i == count($towns[$key])) {
//            echo "<br>";
//        }
//        $i++;
//    } while ($i <= count($towns[$key]));
//}

function X_Towns($array, $letter) //Универсальнее, с поиском по любой букве
{
    $result = "Вы запросили города на букву $letter<br>"; // Переменная-аккумулятор
    foreach ($array as $key => $value) {
        $X_Town = 0; // Это счётчик городов на нужную букву. Нужен для запятых
        $result .= "$key:<br>";
        for ($i = 0; $i <= count($array[$key]); $i++) {
            $town = $array[$key][$i];
            if (mb_substr($town, 0, 1, 'UTF8') == "$letter") {
                if ($X_Town > 0) $result .= ", ";
                $X_Town++;
                $result .= $town;
            }
            if ($i == count($array[$key])) {
                $result .= "<br>";
            }
        }
    }
    return $result;
}
echo X_Towns($towns, "К");

echo "<br><br>Задание 9 Карьера блогера<br>";

function blogging($string, $alphabet)
{
    $arr = preg_split('#(?<!^)(?!$)#u', $string);
    for ($i = 0; $i < count($arr); $i++) {
        $symbol = $arr[$i];
        if (mb_strtolower($symbol) == $symbol) {
            if (array_key_exists($symbol, $alphabet)) {
                echo $alphabet[$symbol];
            } elseif ($symbol == " ") {
                echo "_";
            } else echo $symbol;
        } else {
            $symbol = mb_strtolower($symbol);
            echo ucfirst($alphabet[$symbol]);
        }
    }
    return ob_get_clean();
}

echo blogging("Ну всё. Пора становиться крутым блогером!", $alfabet);
echo "<br>----------Или------------<br>";
echo noSpace(translit("Или двумя старыми функциями", $alfabet));