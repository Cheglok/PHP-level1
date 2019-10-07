<?php
echo "<br><br>--------------Задание 5 Пробелы--------------<br><br>";

$string = "Белка на болгарском языке звучит как 'Протеин'.";

function airToGround($str)
{
    return str_replace(" ", "_", $str);
}

echo airToGround($string);