<?php
function add($a, $b)
{
    return $a + $b;
}

function subtract($a, $b)
{
    return $a - $b;
}

function multiply($a, $b)
{
    return $a * $b;
}

function split($a, $b)
{
    return ($b == 0) ? "Нельзя делить на 0" : $a / $b;
}

function Calculator($arg1, $arg2, $operation)
{
    return $operation($arg1, $arg2);
}

$arg1 = (int)$_REQUEST['arg1'];
$arg2 = (int)$_REQUEST['arg2'];
$symbol = strip_tags(htmlspecialchars($_REQUEST['symbol']));

if ($symbol) {
    switch ($symbol) {
        case "+":
            $operation = "add";
            break;
        case "-":
            $operation = "subtract";
            break;
        case "*":
            $operation = "multiply";
            break;
        case "/":
            $operation = "split";
            break;
    }
    $result = Calculator($arg1, $arg2, $operation);
    $answer = "{$arg1} {$symbol} {$arg2} = {$result}";
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form-calculator</title>
</head>
<body>
<a href="index.php">Назад</a>
<form action="" method="get">
    <input type="text" name="arg1" value="<?= $arg1 ?>">
    <input type="text" name="arg2" value="<?= $arg2 ?>">
    <input type="submit" value="+" name="symbol">
    <input type="submit" value="-" name="symbol">
    <input type="submit" value="*" name="symbol">
    <input type="submit" value="/" name="symbol">
</form>
<p><?= $answer ?></p>
</body>
</html>
