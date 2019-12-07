<?php
/** @var int $count*/
?>
<a href="/">Главная</a>
<a href="/product/catalog/?page=2">Каталог</a>
<a href="/basket/">Корзина <span id="count"><?=$count? $count : ''?></span></a>
<? if ($auth):?>
<a href="/order/">Заказы <span id="ordersCount"><?=$ordersCount? $ordersCount : ''?></span></a>
<? endif;?>
<br>