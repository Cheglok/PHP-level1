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


$arg1 =(int)$_REQUEST['arg1'];
$arg2 = (int)$_REQUEST['arg2'];
$operation = strip_tags(htmlspecialchars($_REQUEST['operation']));

if($operation) {
        switch($operation) {
        case "add":
            $symbol = "+";
            $add = "selected";
            break;
        case "subtract":
            $symbol = "-";
            $subtract = "selected";
            break;
        case "multiply":
            $symbol = "*";
            $multiply = "selected";
            break;
        case "split":
            $symbol = "/";
            $split = "selected";
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
<form action="" method="post">
    <input type="text" name="arg1" value="<?=$arg1?>">
    <input type="text" name="arg2" value="<?=$arg2?>">
    <select name="operation" id="operation">
        <option value="add" <?=$add?>>+</option>
        <option value="subtract" <?=$subtract?>>-</option>
        <option value="multiply" <?=$multiply?>>*</option>
        <option value="split" <?=$split?>>/</option>
    </select>
    <input type="submit" value="OK">
</form>
<p><?=$answer?></p>
</body>
</html>
