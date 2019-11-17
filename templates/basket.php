<?php
/** @var Basket $basket */
/** @var string $form */

use app\models\Basket;

?>
<h2>Корзина</h2>
<? foreach ($basket as $item) : ?>
    <div class="basket-item" id="<?=$item['basket_id']?>">
        <img src="/img/<?= $item['image'] ?>" alt="puppy" width="200">
        <h3><?= $item['name'] ?></h3>
        <button data-id="<?= $item['basket_id'] ?>" class="delete">Удалить</button>
    </div>
<? endforeach; ?>
<a href="/basket/order">Оформить заказ</a>
<?=$form?>


<script>
    let buttons = document.querySelectorAll('.delete');

    buttons.forEach((elem)=> {
        elem.addEventListener('click', ()=>{
            let id = elem.getAttribute('data-id');
            (
                async ()=> {
                    const response = await fetch('/basket/deleteFromBasket/', {
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
                    if(answer.count == 0) {
                        document.getElementById('count').remove();
                    }
                    document.getElementById(id).remove();
                }
            )()
        })
    });
</script>