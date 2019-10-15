<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>
    <div class="gallery">

<!--Очень долго пытался устроить получение имени фотографии при запросе с id, получился какой-то непонятный монстр-->
<? while ($row = mysqli_fetch_assoc($params['result'])): ?>
    <? if ($n = mysqli_fetch_assoc(@mysqli_query($db, "SELECT `fileName`, `likes` FROM `gallerylist` WHERE `id`={$row['id']}"))): ?>
        <a href="/?page=image&image=<?= $n['fileName'] ?>">
            <img src="images/gallery_img/small/<?= $n['fileName'] ?>" width="150" height="100"/>
        </a>
    <? endif ?>
<? endwhile ?>


<!--        Вариант короче и проще, но тут не используется id-->
<!--      --><?// while ($row = mysqli_fetch_assoc($params['result'])):?>
<!--        <a rel="gallery" class="photo" href="images/gallery_img/big/--><?//=$row['fileName']?><!--">-->
<!--            <img src="images/gallery_img/small/--><?//=$row['fileName']?><!--" width="150" height="100">-->
<!--        </a>-->
<!--      --><?// endwhile ?>


    </div>
</div>
</body>
</html>


