<?php

namespace app\core;

class Controller
{
    protected function view(string $view, $params = [])
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/view/');
        
        $twig = new \Twig\Environment($loader, []);

        $twig->addGlobal('BASE', BASE);
        $twig->addGlobal('USER_NAME', $_COOKIE['user_name'] ?? null);

        echo $twig->render($view . '.twig.php', $params);
    }
}
