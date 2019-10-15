<h2>Изображение</h2>
<div>
    <?=$params['a']?>
    <p>
        Просмотров <?=mysqli_fetch_assoc(@mysqli_query($db,
            "SELECT `likes` FROM `gallerylist` WHERE `fileName`= '$image'"))['likes']?>
    </p>
    <img src="images/gallery_img/big/<?=$params['image']?>"/>
</div>