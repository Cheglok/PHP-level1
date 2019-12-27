<?php
?>
<form class="order-form" action="/basket/processOrder" method="post">
    <p>Ваш телефон: <input type="text" name="tel" placeholder="+7-000-000-00-00"></p>
    <p>Ваш емейл: <input type="text" name="email" placeholder="geekbrains@mail.ru"></p>
    <input hidden name="session_id" value="<?=$session_id?>">
    <input type="submit" name="send" value="Отправить заказ">
</form>

