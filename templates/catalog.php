<?php
?>
<h2>Каталог</h2>
<div class="wrapper">
    <? foreach ($catalog as $dog): ?>
        <div class="item">
            <form method="post" action="?action=buy">
                <img src="/img/<?= $dog['image'] ?>.jpeg" alt="puppy" width="200">
                <h3><?= $dog['name'] ?></h3>
                <a href="/product/card/?id=<?= $dog['id']?>">Подробнее...</a>
                <input hidden type="text" name="dog_id" value="<?= $dog['id'] ?>">
                <input type="submit" value="Купить">
            </form>
        </div>
    <? endforeach; ?>
</div>