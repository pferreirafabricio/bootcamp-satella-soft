<?php

namespace app\core;

class Controller
{
    protected function view(string $view, $params = [])
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/site/view/');

        $twig = new \Twig\Environment($loader, []);

        $twig->addGlobal('BASE', BASE);
        $twig->addGlobal('DATE_TIME', DATE_TIME);
        $twig->addGlobal('HOST', HOST);

        echo $twig->render($view . '.twig.php', $params);
    }


    protected function showMessage(string $title, string $message)
    {
        $this->view('partials/message', [
            'title'   => $title,
            'message' => $message
        ]);
    }
}
