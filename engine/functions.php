<?php

function render($page, $params = [])
{
    _log($page);
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
    ob_start();
    echo "<ul>\n";
    if (isset($links)) {
        foreach ($links as $key => $value) {
            if (is_array($value) && array_key_exists('link', $value)) {
                echo "<li><a href=\"{$value['link']}\">{$value['title']}</a></li>\n";
            } else if (is_array($value)) {
                echo "<h4>{$key}</h4>\n";
                echo makeMenu($value);
            } else {
                continue;
            }
        }
    }
    echo "</ul>\n";
    return ob_get_clean();
}