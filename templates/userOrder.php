<?php
/** @var Basket $basket */
/** @var string $form */
use app\models\entities\Basket;

?>
<h2>Заказ <?=$id?></h2><h2 class="fade" style="display: none; position: absolute; top: 50px; left:200px;"></h2>
<? foreach ($basket as $item) : ?>
    <div class="basket-item" id="<?=$item['basket_id']?>">
        <img src="/img/<?= $item['image'] ?>" alt="puppy" width="200">
        <h3><?= $item['name'] ?></h3>
    </div>
<? endforeach;?>

<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
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
                    document.querySelector('.fade').innerText = answer.response;
                    setTimeout(function(){
                        $('.fade').fadeIn(500);
                        $('.fade').fadeOut(1000)},100);
                    if(answer.count == 0) {
                        document.getElementById('count').remove();
                    }
                    document.getElementById(id).remove();
                }
            )()
        })
    });
</script>