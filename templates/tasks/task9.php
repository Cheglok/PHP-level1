<?php
echo "<br><br>--------------Задание 9 Блоггерство--------------<br><br>";

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

function airToGround($str)
{
    return str_replace(" ", "_", $str);
}

$header = "10 рецептов создания убойных хедлайнов!";

function headerToUrl($header, $alphabet)
{
    return airToGround(translit($header, $alphabet));
}

echo headerToUrl($header, $alphabet);