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
        $fileName = str_replace("app", $root, $className);
        $fileName = str_replace('\\', '/', $fileName);
        $fileName = $fileName . ".php";
            if (file_exists($fileName)) {
                include $fileName;
            }
    }

}