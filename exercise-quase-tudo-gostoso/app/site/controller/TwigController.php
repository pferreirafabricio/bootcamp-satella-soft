<?php 

namespace app\site\controller;

class TwigController 
{
    protected function view(string $view, $params = [])
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/site/views');
        $twig = new \Twig\Environment($loader, []);

        $twig->addGlobal('BASE', BASE);

        echo $twig->render($view . '.twig.php', $params);
    }
}