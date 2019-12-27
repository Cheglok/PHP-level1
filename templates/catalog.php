<?php
/** @var ProductTest $catalog */
/** @var int $page */

use app\models\Product;

?>
<h2>Каталог</h2>
<h2 class="fade" style="display: none; position: absolute; top: 50px; left:200px;"></h2>
<div class="catalog-wrapper">
    <? foreach ($catalog as $dog): ?>
        <div class="item">
            <img src="/img/<?= $dog['image'] ?>" alt="puppy" width="200">
            <h3><?= $dog['name'] ?></h3>
            <a href="/product/card/?id=<?= $dog['id'] ?>">Подробнее...</a>
            <button data-id="<?= $dog['id'] ?>" class="buy">Купить</button>
        </div>
    <? endforeach; ?>

</div>
<p><a href="/product/catalog/?page=<?= $page ?>">ещё</a></p>


<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
<script>
    let buttons = document.querySelectorAll('.buy');

    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (
                async () => {
                    const response = await fetch('/basket/addToBasket/', {
                        method: 'POST',
                        headers: new Headers({
                            'Content-Type': 'application/json'
                        }),
                        body: JSON.stringify({
                            id: id
                        })
                    });
                    const answer = await response.json();
                    document.getElementById('count').innerText = answer.count;
                    document.querySelector('.fade').innerText = answer.response;
                    setTimeout(function(){
                        $('.fade').fadeIn(500);
                        $('.fade').fadeOut(1000)},100);
                }
            )()
        })
    });
</script>
