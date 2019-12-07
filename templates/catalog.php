<?php
/** @var ProductTest $catalog */
/** @var int $page */

use app\models\Product;

?>
<h2>Каталог</h2>
<div class="wrapper">
    <? foreach ($catalog as $dog): ?>
        <div class="item">
            <img src="/img/<?= $dog['image'] ?>" alt="puppy" width="200">
            <h3><?= $dog['name'] ?></h3>
            <a href="/product/card/?id=<?= $dog['id'] ?>">Подробнее...</a>
            <button data-id="<?= $dog['id'] ?>" class="buy">Купить</button>
        </div>
    <? endforeach; ?>
    <p><a href="/product/catalog/?page=<?= $page ?>">ещё</a></p>
</div>

<script src="/js/buyingScript.js"></script>