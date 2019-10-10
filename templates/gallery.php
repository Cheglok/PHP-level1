
<h2> Здесь галерея<h2>
<div>
    <? foreach ($imagesList as $image): ?>
        <a href="images/gallery_img/big/<?=$image?>" target="_blank"><img src="images/gallery_img/small/<?=$image?>"></a>
    <? endforeach; ?>
</div>

