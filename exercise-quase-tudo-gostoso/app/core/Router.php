<?php 

$param = get('url');

$controllerName = "RevenueController";
$controllerMethod = "index";

foreach ($router as $key => $value) {
    if ($key === $param) {
        $controller = explode('@', $value);
        $controllerName = $controller[0];
        $controllerMethod = $controller[1];
        break;
    }
}

$controller = 'app\\site\\controller\\'. $controllerName;

call_user_func([
    new $controller(),
    $controllerMethod
],[]);
