<?php
require_once "config.php";

switch ($_GET['action']) {
    case "delete_item":
        $id = (int)($_GET['id']);
        $sql = "DELETE FROM `basket` WHERE id = '{$id}' AND session = '{$session_id}'";
        $result = mysqli_query($db, $sql);
        $_SESSION['basket_count'] -= 1;

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
        $sql="DELETE FROM `basket` WHERE `session`= '{$session_id}'";
        $result = mysqli_query($db, $sql);
        $_SESSION['basket_count'] = 0;

        header("Location: basket.php?message=confirm");
        break;
}

$sql = "SELECT basket.id as basket_id, shop.name as name, shop.picture as picture FROM `basket`, `shop` WHERE basket.dog_id=shop.id AND session='{$session_id}'";
$basket = mysqli_query($db, $sql);
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
<a href="basket.php">Корзина(<?=$_SESSION['basket_count']?>)</a><br><br>
<?include 'authorization-form.php'?>
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

