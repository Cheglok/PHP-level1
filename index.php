<?php
require_once "config.php";

switch ($_GET['action']) {
    case "add":
        if (!empty($_POST['submit'])) {
            $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['username'])));
            $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['feedback'])));
            $dog_id = (int)($_POST['dog_id']);
            $sql = "INSERT INTO `feedback` (`name`, `feedback`, `dog_id`) VALUES ('{$name}', '{$feedback}', '{$dog_id}');";
            $result = mysqli_query($db, $sql);

            header("Location: /?message=OK");
        }
        break;
    case "edit":
        $id = (int)($_GET['id']);
        $dog_id = (int)($_GET['dog_id']);
        $result = mysqli_query($db, "SELECT * FROM `feedback` WHERE id = {$id}");
        $$dog_id = mysqli_fetch_assoc($result);
        $$dog_id['refactor'] = "Change ";
        $action = "update";
        break;
    case "update":
        $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['username'])));
        $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['feedback'])));
        $id = (int)($_POST['id']);
        $sql = "UPDATE `feedback` SET `name` = '{$name}', `feedback` = '{$feedback}' WHERE `feedback`.`id` = {$id};";
        $result = mysqli_query($db, $sql);

        header("Location: /?message=edit");
        break;
    case "delete":
        $id = (int)($_GET['id']);
        $sql = "DELETE FROM `feedback` WHERE id = {$id}";
        $result = mysqli_query($db, $sql);

        header("Location: /?message=delete");
        break;
    case "buy":
        $dog_id = (int)($_POST['dog_id']);
        $sql = "INSERT INTO `basket`(`dog_id`, `session`) VALUES ('{$dog_id}', '{$session_id}')";
        $result = mysqli_query($db, $sql);

        header("Location: /?message=buy");
        break;
}
$result = mysqli_query($db, "SELECT * FROM `shop` WHERE 1 ");
$feedback = mysqli_query($db, "SELECT * FROM `feedback` WHERE 1 ORDER BY `id` DESC");


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<a href="basket.php">Корзина(<?=$basketItems?>)</a><br><br>
<? if (!$allow): ?>
    <form method="post">
        <p><input type="text" name="login" placeholder="login"/></p>
        <p><input type="password" name="password" placeholder="password"/></p>
        <p><input type="checkbox" name="remember" />REMEMBER ME</p>
        <p><input type="submit" value="Войти" /></p>
    </form>
<? else:?>
    <p>Добро пожаловать <?=$login?></p> <a href="/?logout">Выход</a>
<? endif;?><br><br><br>
<h3><?= $message ?></h3>
<div class="wrapper">
    <? foreach ($result as $dog): ?>
        <div class="item">
            <form method="post" action="?action=buy">
                <img src="images/<?= $dog['picture'] ?>.jpeg" alt="puppy" width="200">
                <h3><?= $dog['name'] ?></h3>
                <a href="item.php?dog_id=<?= $dog['id'] ?>">Подробнее...</a>
                <input hidden type="text" name="dog_id" value="<?= $dog['id'] ?>">
                <input type="submit" value="Купить">
            </form>
            <h3>Обсуждение</h3>
            <form method="post" action="?action=<?= $action ?>">
                <input hidden type="text" name="id" value="<?= ${$dog['id']}['id'] ?>">
                <input hidden type="text" name="dog_id" value="<?= $dog['id'] ?>">
                <input type="text" name="username" placeholder="username"
                       value="<?= ${$dog['id']}['name'] ?>">
                <input type="text" name="feedback" placeholder="your feedback"
                       value="<?= ${$dog['id']}['feedback'] ?>">
                <input type="submit" name="submit" value="<?= ${$dog['id']}['refactor'] . $buttonText ?>">
            </form>
            <? foreach ($feedback as $comment): ?>
                <? if ($comment['dog_id'] == $dog['id']): ?>
                    <?= $comment['name'] ?>: <?= $comment['feedback'] ?><br>
                    <a href="?action=edit&dog_id=<?= $dog['id'] ?>&id=<?= $comment['id'] ?>">[edit]</a>
                    <a href="?action=delete&dog_id=<?= $dog['id'] ?>&id=<?= $comment['id'] ?>">[X]</a><br>
                <? endif; ?>
            <? endforeach; ?>
        </div>
    <? endforeach; ?>
</div>
</body>
</html>