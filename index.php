<?php
function renderTemplate($page, $content="")
{
    ob_start();
    include $page . ".php";
    return ob_get_clean();
}

echo renderTemplate(layout, renderTemplate(header) . renderTemplate(menu)
    . renderTemplate(hello). renderTemplate(footer));