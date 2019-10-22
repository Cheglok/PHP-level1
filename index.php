<?php
require_once "db.php";
$action = "add";
$buttonText = "Comment";



switch ($_GET['action']) {
    case "add":
        if (!empty($_POST['submit'])) {
            $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['username'])));
            $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['feedback'])));
            $dogId = (int)($_POST['dogId']);
            $sql = "INSERT INTO `feedback` (`name`, `feedback`, `dogId`) VALUES ('{$name}', '{$feedback}', '{$dogId}');";
            $result = mysqli_query($db, $sql);

            header("Location: /?message=OK");
        }
        break;
    case "edit":
        $id = (int)($_GET['id']);
        $dogId = (int)($_GET['dogId']);
        $result = mysqli_query($db, "SELECT * FROM `feedback` WHERE id = {$id}");
        $$dogId = mysqli_fetch_assoc($result);
        $$dogId['refactor'] = "Change ";
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
}


$result = mysqli_query($db, "SELECT * FROM `shop` WHERE 1 ");
$feedback = mysqli_query($db, "SELECT * FROM `feedback` WHERE 1 ORDER BY `id` DESC");

if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case "OK":
            $message = "Message added";
            break;
        case "edit":
            $message = "Message edited";
            break;
        case "delete":
            $message = "Message deleted";
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
<a href="calculator1.php">Калькулятор1</a>
<a href="calculator2.php">Калькулятор2</a>
<div class="wrapper">
    <? foreach ($result as $dog): ?>
        <div class="item">
            <img src="images/<?= $dog['picture'] ?>.jpeg" alt="puppy" width="200">
            <h3><?= $dog['name'] ?></h3>
            <a href="item.php?dogId=<?= $dog['id'] ?>">Подробнее...</a>
            <h3>Обсуждение</h3>
            <form method="post" action="?action=<?= $action ?>">
                <input hidden type="text" name="id" value="<?= ${$dog['id']}['id'] ?>">
                <input hidden type="text" name="dogId" value="<?= $dog['id'] ?>">
                <input type="text" name="username" placeholder="username"
                       value="<?= ${$dog['id']}['name'] ?>">
                <input type="text" name="feedback" placeholder="your feedback"
                       value="<?= ${$dog['id']}['feedback'] ?>">
                <input type="submit" name="submit" value="<?= ${$dog['id']}['refactor'] . $buttonText ?>">
            </form>
            <? foreach ($feedback as $comment): ?>
                <? if ($comment['dogId'] == $dog['id']): ?>
                    <?= $comment['name'] ?>: <?= $comment['feedback'] ?><br>
                    <a href="?action=edit&dogId=<?= $dog['id'] ?>&id=<?= $comment['id'] ?>">[edit]</a>
                    <a href="?action=delete&dogId=<?= $dog['id'] ?>&id=<?= $comment['id'] ?>">[X]</a><br>
                <? endif; ?>
            <? endforeach; ?>
        </div>
    <? endforeach; ?>
</div>
<h3><?= $message ?></h3>
</body>
</html>