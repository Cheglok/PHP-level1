<?php
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