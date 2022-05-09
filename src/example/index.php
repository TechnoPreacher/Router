<?php

require_once "vendor/autoload.php";

use Ns\Router\Router;

$router = new Router();

$router->addRoute('/a/b', [\Ns\Router\SomeClass::class, 'view']);
$router->addRoute('/c/d', function () {
    echo 'Run callback'; return 10;
});
$sc = new \Ns\Router\SomeClass();
$router->addRoute('/aa/bb', [$sc, 'view2']);

try {
    $action = $router->route($_SERVER["REQUEST_URI"]);
    if (is_callable($action)) {
        $action();
    }

} catch (Exception $e) {
    echo "exception catched. 404";
}

