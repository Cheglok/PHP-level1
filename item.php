<?php
require_once "config.php";

$dog_id = (int)($_REQUEST['dog_id']);

switch ($_GET['action']) {
    case "add":
        if (!empty($_POST['submit'])) {
            $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['username'])));
            $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['feedback'])));
            $dog_id = (int)($_POST['dog_id']);
            $sql = "INSERT INTO `feedback` (`name`, `feedback`, `dog_id`) VALUES ('{$name}', '{$feedback}', '{$dog_id}');";
            $result = mysqli_query($db, $sql);

            header("Location: /item.php?dog_id={$dog_id}&message=OK");
        }
        break;
    case "edit":
        $id = (int)($_GET['id']);
        $dog_id = (int)($_GET['dog_id']);
        $result = mysqli_query($db, "SELECT * FROM `feedback` WHERE id = {$id}");
        $row = mysqli_fetch_assoc($result);
        $buttonText = "Refactor comment";
        $action = "update";
        break;
    case "update":
        $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['username'])));
        $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['feedback'])));
        $id = (int)($_POST['id']);
        $sql = "UPDATE `feedback` SET `name` = '{$name}', `feedback` = '{$feedback}' WHERE `feedback`.`id` = {$id};";
        $result = mysqli_query($db, $sql);

        header("Location: /item.php?dog_id={$dog_id}&message=edit");
        break;
    case "delete":
        $id = (int)($_GET['id']);
        $sql = "DELETE FROM `feedback` WHERE id = {$id}";
        $result = mysqli_query($db, $sql);

        header("Location: /item.php?dog_id={$dog_id}&message=delete");
        break;
    case "buy":
        $dog_id = (int)($_POST['dog_id']);
        $sql = "INSERT INTO `basket`(`dog_id`, `session`) VALUES ('{$dog_id}', '{$session_id}')";
        $result = mysqli_query($db, $sql);

        header("Location: /item.php?dog_id={$dog_id}&message=buy");
        break;
}

$result = mysqli_query($db, "SELECT * FROM `shop`dog WHERE id = '{$dog_id}'");
$dog=mysqli_fetch_assoc($result);
$feedback = mysqli_query($db, "SELECT * FROM `feedback` WHERE  dog_id = '{$dog_id}' ORDER BY `id` DESC");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div id="wrapper">
    <a href="index.php">Назад</a>
    <a href="basket.php">Корзина</a>
        <div class="card">
            <img src="images/<?= $dog['picture'] ?>.jpeg" alt="puppy" width="600">
            <h3><?= $dog['name'] ?></h3>
            <p><?=$dog['description']?></p>
            <form method="post" action="?action=buy">
                <input hidden type="text" name="dog_id" value="<?= $dog['id'] ?>">
                <input type="submit" value="Купить">
            </form>
            <h3>Обсуждение</h3>
            <form method="post" action="?action=<?= $action ?>">
                <input hidden type="text" name="id" value="<?= $row['id'] ?>">
                <input hidden type="text" name="dog_id" value="<?= $dog_id ?>">
                <input type="text" name="username" placeholder="username"
                       value="<?= $row['name'] ?>">
                <input type="text" name="feedback" placeholder="your feedback"
                       value="<?= $row['feedback'] ?>">
                <input type="submit" name="submit" value="<?=$buttonText ?>">
                <h3><?= $message ?></h3>
            </form>
            <? foreach ($feedback as $comment): ?>
                    <?= $comment['name'] ?>: <?= $comment['feedback'] ?><br>
                    <a href="item.php?dog_id=<?= $dog['id'] ?>&action=edit&dog_id=<?= $dog['id'] ?>&id=<?= $comment['id'] ?>">[edit]</a>
                    <a href="item.php?dog_id=<?= $dog['id'] ?>&action=delete&dog_id=<?= $dog['id'] ?>&id=<?= $comment['id'] ?>">[X]</a><br>
            <? endforeach; ?>
        </div>
</div>
</body>
</html>
