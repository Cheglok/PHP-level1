<?php
/** @var int $count */
?>
<ul class="main-navigation">
    <li><a href="/">Главная</a></li>
    <li><a href="/product/catalog/?page=2">Каталог</a></li>
    <li><a href="/basket/">Корзина <span id="count"><?= $count ? $count : '' ?></span></a></li>
    <? if ($name == 'admin'): ?>
        <li>
            <a href="/order/">Заказы пользователей<!--<span id="ordersCount"><//?=$ordersCount? $ordersCount : ''?></span>--></a>
        </li>
    <? elseif ($auth):?>
        <li>
            <a href="/order/myOrder">Мои заказы<!--<span id="ordersCount"><//?=$ordersCount? $ordersCount : ''?></span>--></a>
        </li>
    <? endif; ?>
</ul>
