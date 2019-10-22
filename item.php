<?php
require_once "db.php";
$action = "add";
$buttonText = "Comment";

$dogId = (int)($_REQUEST['dogId']);

switch ($_GET['action']) {
    case "add":
        if (!empty($_POST['submit'])) {
            $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['username'])));
            $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['feedback'])));
            $dogId = (int)($_POST['dogId']);
            $sql = "INSERT INTO `feedback` (`name`, `feedback`, `dogId`) VALUES ('{$name}', '{$feedback}', '{$dogId}');";
            $result = mysqli_query($db, $sql);

            header("Location: /item.php?dogId={$dogId}&message=OK");
        }
        break;
    case "edit":
        $id = (int)($_GET['id']);
        $dogId = (int)($_GET['dogId']);
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

        header("Location: /item.php?dogId={$dogId}&message=edit");
        break;
    case "delete":
        $id = (int)($_GET['id']);
        $sql = "DELETE FROM `feedback` WHERE id = {$id}";
        $result = mysqli_query($db, $sql);

        header("Location: /item.php?dogId={$dogId}&message=delete");
        break;
}

$result = mysqli_query($db, "SELECT * FROM `shop` WHERE id = '{$dogId}'");
$dog=mysqli_fetch_assoc($result);
$feedback = mysqli_query($db, "SELECT * FROM `feedback` WHERE  dogId = '{$dogId}' ORDER BY `id` DESC");

if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case "OK":
            $message = "Сообщение добавлено";
            break;
        case "edit":
            $message = "Сообщение отредактировано";
            break;
        case "delete":
            $message = "Сообщение удалено";
            break;
        default:
            $message = "";
    }
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
<div id="wrapper">
    <a href="index.php">Назад</a>
        <div class="card">
            <img src="images/<?= $dog['picture'] ?>.jpeg" alt="puppy" width="600">
            <h3><?= $dog['name'] ?></h3>
            <p><?=$dog['description']?></p>
            <button type="button">Купить</button>
            <h3>Обсуждение</h3>
            <form method="post" action="?action=<?= $action ?>">
                <input hidden type="text" name="id" value="<?= $row['id'] ?>">
                <input hidden type="text" name="dogId" value="<?= $dogId ?>">
                <input type="text" name="username" placeholder="username"
                       value="<?= $row['name'] ?>">
                <input type="text" name="feedback" placeholder="your feedback"
                       value="<?= $row['feedback'] ?>">
                <input type="submit" name="submit" value="<?=$buttonText ?>">
                <h3><?= $message ?></h3>
            </form>
            <? foreach ($feedback as $comment): ?>
                    <?= $comment['name'] ?>: <?= $comment['feedback'] ?><br>
                    <a href="item.php?dogId=<?= $dog['id'] ?>&action=edit&dogId=<?= $dog['id'] ?>&id=<?= $comment['id'] ?>">[edit]</a>
                    <a href="item.php?dogId=<?= $dog['id'] ?>&action=delete&dogId=<?= $dog['id'] ?>&id=<?= $comment['id'] ?>">[X]</a><br>
            <? endforeach; ?>
        </div>
</div>
</body>
</html>
