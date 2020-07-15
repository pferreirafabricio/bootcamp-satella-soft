<?php

$req = get('url');

$controller = 'HomeController';
$metodo = 'index';


foreach ($router as $key => $value) {
    if ($req == $key) {
        $ex = explode('@', $value);

        $controller = $ex[0];
        $metodo = $ex[1];
        break;
    }
}

$cont = 'app\\site\\controller\\' . $controller;

call_user_func([
    new $cont(),
    $metodo
], []);
