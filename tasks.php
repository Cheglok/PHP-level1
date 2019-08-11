<?php
//echo "Задание 1 Плюс-Минус-Умножение<br><br>";
//$a = rand(-15, 15);
//$b = rand(-30, 30);
//echo "a={$a}<br> b={$b}<br>";
//if ($a >= 0 && $b >= 0) {
//    echo "а вычесть b равно ", $a - $b;
//} elseif ($a < 0 && $b < 0) {
//    echo "а умножить на b равно ", $a * $b;
//} else {
//    echo "а плюс b равно ", $a + $b;
//}
//
//echo "<br><br>Задание 2 switch 0-15<br><br>";
//$c = rand(0, 15);
//switch ($c) {
//    case 0:
//        echo 0;
//    case 1:
//        echo 1;
//    case 2:
//        echo 2;
//    case 3:
//        echo 3;
//    case 4:
//        echo 4;
//    case 5:
//        echo 5;
//    case 6:
//        echo 6;
//    case 7:
//        echo 7;
//    case 8:
//        echo 8;
//    case 9:
//        echo 9;
//    case 10:
//        echo 10;
//    case 11:
//        echo 11;
//    case 12:
//        echo 12;
//    case 13:
//        echo 13;
//    case 14:
//        echo 14;
//    case 15:
//        echo 15;
//}
//
//echo "<br><br>Задание 3 Четыре операции<br><br>";
//
//function add($a, $b)
//{
//    return $a + $b;
//}
//
//;
//function subtract($a, $b)
//{
//    return $a - $b;
//}
//
//;
//function multiply($a, $b)
//{
//    return $a * $b;
//}
//
//;
//function split($a, $b)
//{
//    return ($b == 0) ? "Нельзя делить на 0" : $a / $b;
//}
//
//echo add($a, $b), " сумма<br>";
//echo subtract($a, $b), " разность<br>";
//echo multiply($a, $b), " произведение<br>";
//echo split($a, $b), " частное<br>";
//
//echo "<br><br>Задание 4 Калькулятор<br><br>";
//
//function calculator($arg1, $arg2, $operation)
//{
//    switch ($operation) {
//        case "add":
//            return add($arg1, $arg2);
//            break;
//        case "subtract":
//            return subtract($arg1, $arg2);
//            break;
//        case "multiply":
//            return multiply($arg1, $arg2);
//            break;
//        case "split":
//            return split($arg1, $arg2);
//            break;
//        default:
//            return "Калькулятор не знает такой математической операции<br>
//            Попробуйте add, subtract, multiply, split";
//    }
//}
//
//echo calculator($a, $b, "add");
//
//echo "<br><br>Задание 6 Возведу в любую целую степень!<br><br>";
//function power($val, $pow)
//{
//    if (!is_int($pow)) {
//        return "Степень должна быть целым числом";
//    } elseif ($pow == 0) {
//        return 1;
//    } elseif ($pow > 0) {
//        return $val * power($val, $pow - 1);
//    } else {
//        return 1 / $val * power($val, $pow + 1);
//    }
//}
//
//echo power(4, -3);
//
//echo "<br><br>Задание 7 Сколько время?<br><br>";
//
////Функция определения и подстановки склонения. Указать переменную и три формы склонения слова
//function declension($item, $singular_form, $dual_form, $plural_form)
//{
//    if ($item % 10 == 1 && $item != 11) {
//        return "$item $singular_form";
//    } elseif ($item % 10 < 5 && $item % 10 > 1 && (int)($item / 10) != 1) {
//        return "$item $dual_form";
//    } else {
//        return "$item $plural_form";
//    }
//}
//
//function show_time()
//{
//    $hours = date('G');
//    $minutes = date('i');
////    $hours = rand(1, 24); //Рандомные значения для тестов
////    $minutes = rand(1, 60);
//    echo declension($hours, "час", "часа", "часов");
//    echo " "; //Вывод пробела не включен в функцию, т.к. он не обязательный
//    echo declension($minutes, "минута", "минуты", "минут");
//}
//
//show_time();
//echo "<br>Пример работы<br>";
//for($ho=0;$ho<25;$ho++){
//    echo declension($ho, "яблоко", "яблока", "яблок") . " ";
//}
function foo($x){
    echo $x--;
    if($x>0) foo($x);
}
foo(5);