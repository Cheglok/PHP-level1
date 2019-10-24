<?php
require_once "config.php";

$sql = "SELECT basket.id as basket_id, shop.name as name, shop.picture as picture FROM `basket`, `shop` WHERE basket.dog_id=shop.id AND session='{$session_id}'";
$basket = mysqli_query($db, $sql);


switch ($_GET['action']) {
    case "delete_item":
        $id = (int)($_GET['id']);
        $sql = "DELETE FROM `basket` WHERE id = {$id}";
        $result = mysqli_query($db, $sql);

        header("Location: basket.php?message=item_delete");
        break;
    case "order":
        $order="true";
        break;
    case "confirm":
        $tel = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_REQUEST['tel'])));
        $email = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_REQUEST['email'])));
        $sql = "INSERT INTO `orders`(`session`, `tel`, `email`) VALUES ('{$session_id}', '{$tel}', '{$email}')";
        $result = mysqli_query($db, $sql);

        header("Location: basket.php?message=confirm");
        break;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<a href="index.php">Назад</a><br>
<a href="basket.php">Корзина(<?=$basketItems?>)</a><br><br>
<? if (!$allow): ?>
    <form method="get">
        <p><input type="text" name="login" placeholder="login"/></p>
        <p><input type="password" name="password" placeholder="password"/></p>
        <p><input type="checkbox" name="remember"/>REMEMBER ME</p>
        <p><input type="submit" value="Войти"/></p>
    </form>
<? else: ?>
    Добро пожаловать <?= $login ?> <a href="basket.php?logout">Выход</a>
<? endif; ?><br><br><br>
<h1><?= $message ?></h1>
<? foreach ($basket as $item) : ?>
    <div class="basket-item">
        <img src="images/<?= $item['picture'] ?>.jpeg" alt="puppy" width="100">
        <h3><?= $item['name'] ?></h3>
        <a href="?action=delete_item&id=<?= $item['basket_id'] ?>">Удалить из корзины</a>
    </div>
<? endforeach; ?>
<? if ($order): ?>
    <form action="?action=confirm" method="post">
<p>Ваш телефон<input type="text" name="tel" placeholder="+7-000-000-00-00"></p>
<p>Ваш емейл<input type="text" name="email" placeholder="geekbrains@mail.ru"></p>
        <input type="submit" value="Подтвердить заказ">
    </form>
<? else: ?>
<a href="?action=order">Оформить заказ</a>
<? endif; ?>
</body>
</html>

