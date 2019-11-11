<?php
/** @var Product $catalog*/

use app\models\Product;

?>
<h2>Каталог</h2>
<div class="wrapper">
    <? foreach ($catalog as $dog): ?>
        <div class="item">
            <form method="post">
                <img src="/img/<?= $dog['image'] ?>" alt="puppy" width="200">
                <h3><?= $dog['name'] ?></h3>
                <a href="/product/card/?id=<?= $dog['id']?>">Подробнее...</a>
                <input hidden type="text" name="dog_id" value="<?= $dog['id'] ?>">
                <input type="submit" value="Купить">
            </form>
        </div>
    <? endforeach; ?>
    <p><a href="/product/catalog/?page=<?=$page?>">ещё</a></p>
</div>