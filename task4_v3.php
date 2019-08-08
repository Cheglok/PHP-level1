<?php
$title = "V3 Главная страница - страница обо мне";
$header = "Третий вариант, str_replace";
$year = 2020;
$src = "https://i.pinimg.com/564x/7c/b4/b2/7cb4b243a13e952321cb064b74057bcd.jpg";
$content = file_get_contents("site.tmpl");
$old = array("{{TITLE}}", "%HEADER%", "№SRC№", "{{YEAR}}");
$new = array($title, $header, $src, $year);
$new_content = str_replace($old, $new, $content);
echo $new_content;