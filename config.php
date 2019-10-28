<?php
session_start();
$session_id = session_id();

$action = "add";
$buttonText = "Comment";
$order = false;

require_once "db.php";
require_once "authorization.php";
require_once "message.php";

if (!isset($_SESSION['basket_count'])) {
    $basketItems = mysqli_query($db, "SELECT COUNT(*) FROM `basket` WHERE `session`='{$session_id}'");
    $basketItems = mysqli_fetch_array($basketItems)[0];
    $_SESSION['basket_count'] = $basketItems;
}