<?php
class Autoload
{
    private $path = [
      'models',
      'engine',
      'interfaces'
    ];

    public function loadClass($className) {
        $root=$_SERVER['DOCUMENT_ROOT'];
        var_dump($root);
        $fileName = str_replace("app", $root, $className);
        $fileName = str_replace('\\', '/', $fileName);
        $fileName = $fileName . ".php";
        var_dump($fileName);
            if (file_exists($fileName)) {
                include $fileName;
                echo "<br>included $fileName<br>";
            }
    }

}