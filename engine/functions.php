<?php

function render($page, $params = [])
{
    _log($page);
    addLooks($params['db'], $params['image']);

    return renderTemplate(LAYOUTS_DIR . 'main', [
            'content' => renderTemplate($page, $params),
            'menu' => renderTemplate('menu', $params),
            'headInfo' => $params['headInfo']
        ]
    );
}


function renderTemplate($page, $params = [])
{
    ob_start();

    if (!is_null($params))
        extract($params);

    $fileName = TEMPLATES_DIR . $page . ".php";
    _log($fileName);
    if (file_exists($fileName)) {
        include $fileName;
    } else {
        Die("Такой страницы не существует. 404");
    }

    return ob_get_clean();
}


function makeMenu($links)
{
    $menuString = '';
    $menuString .= "<ul>\n";
    if (isset($links)) {
        foreach ($links as $key => $value) {
            if (is_array($value) && array_key_exists('link', $value)) {
                $menuString .= "<li><a href=\"{$value['link']}\">{$value['title']}</a></li>\n";
            } else if (is_array($value)) {
                $menuString .= "<h4>{$key}</h4>\n";
                $menuString .= makeMenu($value);
            } else {
                continue;
            }
        }
    }
    $menuString .= "</ul>\n";
    return $menuString;
}

function fillDB($db, $dir)
{
    $imagelist = array_splice(scandir($dir), 2);

    mysqli_query($db, "DELETE FROM `gallerylist` WHERE 1");
    mysqli_query($db, "ALTER TABLE `gallerylist` AUTO_INCREMENT=0");
    foreach ($imagelist as $image) { //Заполним БД

        $size = filesize(IMAGES_DIR . $image);
        mysqli_query($db, "INSERT INTO gallerylist (filename, filesize) VALUES ('$image', '$size байт')");
    }
}

function addLooks($db, $image) {
    mysqli_query($db, "UPDATE `gallerylist` SET `likes` = (`likes` + 1) WHERE `fileName`= '$image'");
}