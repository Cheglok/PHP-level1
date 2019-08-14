<?php
echo "Задание 1<br>";
$i=0;
while(100>=$i++){
    if(!($i%3))echo "$i ";
}

echo "<br><br>Задание 2<br>";

$j=0;
do{
    echo "$j - ";
    switch($j){
        case 0: echo "ноль";
        break;
        default:
            if($j%2) echo "нечетное число";
            else echo "чётное число";
    }
    echo "<br>";
    $j++;
}while($j<=10);

echo "<br><br>Задание 3<br>";
$towns = ["Московская область"=>["Москва", "Зеленоград", "Клин"],
    "Ленинградская область"=>["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"],
    "Рязанская область"=>["Кораблино", "Ряжск", "Рязань"],
    ];
foreach ($towns as $key => $value) {
    echo "$key:<br>";
    $b=0;
    do {
        echo $towns[$key][$b];
        if($b +1 <count($towns[$key])){
            echo ", ";
    }
        if($b==count($towns[$key])){
            echo "<br>";
        }
        $b++;
    } while ($b<=count($towns[$key]));
}

echo "<br><br>Задание 4<br>";

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

echo "<br><br>Задание 5<br>";

function noSspase($string)
{
    $arr = preg_split('#(?<!^)(?!$)#u', $string);
    ob_start();
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] == " ") {
            echo "_";
        } else echo $arr[$i];
    }
    return ob_get_clean();
}

echo noSspase("На основе предыдущего задания!");

echo "<br><br>Задание 7<br>";

for($k=0; $k<=9; $k++, print $k){}

echo "<br><br>Задание 9<br>";

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

function blogging($string, $alphabet)
{
    $arr = preg_split('#(?<!^)(?!$)#u', $string);
    for ($i = 0; $i < count($arr); $i++) {
        $symbol = $arr[$i];
        if (mb_strtolower($symbol) == $symbol) {
            if (array_key_exists($symbol, $alphabet)) {
                echo $alphabet[$symbol];
            }
            elseif ($symbol == " ") {
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