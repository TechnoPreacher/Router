<?php

require_once "vendor/autoload.php";

use Ns\Router\Router;

$router = new Router();

$router->addRoute('/', function (){echo "main page";});

$router->addRoute('/a/b', [\Ns\Router\SomeClass::class, 'view']);
$router->addRoute('/c/d', function () {
    echo 'Run callback'; return 10;
});
$sc = new \Ns\Router\SomeClass();
$router->addRoute('/aa/bb', [$sc, 'view2']);

try {
    $action = $router->route($_SERVER["REQUEST_URI"]);
    if (is_callable($action)) {
        call_user_func_array($action,$router->getParams());
    }
} catch (Exception $e) {
    echo "exception catched. 404";
}

