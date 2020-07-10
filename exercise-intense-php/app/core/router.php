<?php
$action = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_STRING);

$defaultController = 'LoginController';
$defaultMethod = 'login';

if ($action === null || !$action) {
    $controllerPath = 'app\\controller\\' . $defaultController;
    call_user_func_array([new $controllerPath, $defaultMethod], []);
    return;
}

foreach ($router as $key => $value) {
    if ($key == $action) {
        $controller = explode('@', $value);
        $controllerClass =  $controller[0];
        $controllerMethod = $controller[1];

        $controllerPath = 'app\\controller\\' . $controllerClass;
        
        call_user_func_array([new $controllerPath, $controllerMethod], []);
        break;
    }
}
