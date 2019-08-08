<?php
$a = 5;
$b = 7;
echo "Было \$a = $a, \$b = $b<br>Стало<br>";

$b = $a ^ $b ^ ($a = $b);

echo "a = $a<br>";
echo "b = $b";