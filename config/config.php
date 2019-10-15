<?php
define('TEMPLATES_DIR', dirname(DIR) . "/../templates/");
define('LAYOUTS_DIR', 'layouts/');
define('PREVIEWS_DIR', 'images/gallery_img/small/');
define('IMAGES_DIR', 'images/gallery_img/big/');

require_once $_SERVER['DOCUMENT_ROOT'] . "/../engine/functions.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/../engine/log.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/../data/menuList.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/../data/galleryHeadInfo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/../engine/dataBase.php";