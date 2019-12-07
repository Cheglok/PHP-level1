<?php
/** @var ProductTest $product
 * @var $id
 */

use app\models\Product; ?>

<div class="item">
    <img src="/img/<?= $product->{'image'} ?>" alt="puppy" width="200">
    <h3><?= $product->{'name'} ?></h3>
    <p><?= $product->{'description'} ?></p>
    <button data-id="<?= $id ?>" class="buy">Купить</button>
</div>

<script src="/js/buyingScript.js"></script>