<?php
$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_STRING);

$controller = 'LoginController';
$metodo = 'login';

if ($url == null || !$url) {

    $con = 'app\\controller\\' . $controller;

    call_user_func_array([new $con, $metodo], []);

    return;
}

foreach ($router as $key => $value) {
    if ($key == $url) {
        $ex = explode('@', $value);

        $con = 'app\\controller\\' . $ex[0];
        
        call_user_func_array([new $con, $ex[1]], []);
    break;
    }
}
