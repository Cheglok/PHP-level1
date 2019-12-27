<?php
/** @var Order $order */
/** @var $name */

use app\models\entities\Order;

?>
<? if ($name == 'admin'): ?>
    <h2>Заказы</h2>
    <? foreach ($order as $item): ?>
        <div class="order-item" id="<?=$item['id']?>">
            <p>Номер заказа: <?=$item['id']?><a href="/order/showOrder/?id=<?=$item['id']?>&session_id=<?= $item['session_id'] ?>">Просмотреть заказ</a></p>
            <p>Телефон: <?=$item['tel']?></p>
            <p>Email: <?=$item['email']?></p>
            <p>Статус заказа: <?=$item['status']?>
            <form action="/order/orderChange" method="post">
            Изменить статус:
            <select name="status">
                <option value="new">Новый</option>
                <option value="inProgress">В обработке</option>
                <option value="sent">Отправлен</option>
                <option value="closed">Закрыт</option>
            </select>
                <input name="id" hidden value="<?=$item['id']?>">
            <input type="submit" value="Применить"/>
            </form>
            </p>
            <hr>
        </div>
    <? endforeach; ?>
<? else: ?>
    <p>Данная страница доступна только для администратора</p>
<? endif; ?>