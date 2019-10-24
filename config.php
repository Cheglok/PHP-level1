<?php
if (isset($_COOKIE['session_id'])) {
    $session_id = $_COOKIE['session_id'];
}
session_start();
$session_id = session_id();
if (!isset($_COOKIE['session_id'])) {
    setcookie("session_id", $session_id, time()+3600, "/");
}
$action = "add";
$buttonText = "Comment";
$order = false;

require_once "db.php";
require_once "authorization.php";
require_once "message.php";

$basketItems = mysqli_query($db, "SELECT COUNT(*) FROM `basket` WHERE `session`='{$session_id}'");
$basketItems = mysqli_fetch_array($basketItems)[0];