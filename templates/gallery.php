<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>
    <div class="gallery">
        <? foreach ($imagesList as $image): ?>
            <a rel="gallery" class="photo" href="images/gallery_img/big/<?=$image?>">
                <img src="images/gallery_img/small/<?=$image?>" width="150" height="100" />
            </a>
        <? endforeach; ?>
    </div>
</div>



