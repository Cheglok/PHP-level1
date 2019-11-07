<?php
?>
<h2>Корзина</h2>
<? foreach ($basket as $item) : ?>
    <div class="basket-item">
        <p>ID: <?= $item['id'] ?></p>
        <p>GOODS_ID: <?= $item['goods_id'] ?></p>
        <p>SESSION_ID: <?= $item['session_id'] ?></p>
    </div>
<? endforeach; ?>
<a href="/basket/order">Оформить заказ</a>
<?=$form?>
