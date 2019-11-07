<?php
/** @var \app\models\Product $product */

?>

<div class="item">
    <form method="post" action="?action=buy">
        <img src="/img/<?= $product['image'] ?>.jpeg" alt="puppy" width="200">
        <h3><?= $product['name'] ?></h3>
        <a href="/product/card/?id=<?= $product['id']?>">Подробнее...</a>
        <input hidden type="text" name="dog_id" value="<?= $product['id'] ?>">
        <input type="submit" value="Купить">
    </form>
</div>

