<?php


namespace app\engine;


use app\interfaces\IRenderer;




class TwigRender implements IRenderer
{
    protected $loader;
    protected $twig;

    public function __construct()
    {
        $this->loader = new \Twig\Loader\FilesystemLoader('../twigTemplates');
        $this->twig = new \Twig\Environment($this->loader, []);
    }

    public function renderTemplate($template, $params = [])
    {
        $templatePath = $template . ".twig";
       return $this->twig->render($templatePath, $params);
    }


}