<?php
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
        case "item_delete":
            $message = "Товар удалён";
            break;
        case "buy":
            $message = "Товар добавлен в корзину";
            break;
        case "confirm":
            $message = "Ваш заказ отправлен в обработку";
            break;
        default:
            $message = "";
    }
}