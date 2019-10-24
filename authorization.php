<?php
$secretKey = "123";
$currentKey = $_REQUEST['password'];
$cookieKey = $_COOKIE['password'];
$name = $_REQUEST['login'];
$allow = false;

if (isset($_REQUEST['logout'])) {
    setcookie("login");
    setcookie("password");
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
if (empty($currentKey)) {
    if ($cookieKey == $secretKey) {
        $allow = true;
    }
} else if ($currentKey == $secretKey) {
    $allow = true;
    if ($_REQUEST['remember']) {
        setcookie("login", $name, time() + 600, "/");
        setcookie("password", $currentKey, time() + 600, "/");
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }
}
$login = $_COOKIE['login'];