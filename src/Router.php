<?php

namespace Ns\Router;

use Aigletter\Contracts\Routing\RouteInterface;

class Router implements RouteInterface
{


    protected array $routes = [];
    private array $params = [];


    public function __construct($routes = [])
    {

        foreach ($routes as $k => $v)
            $this->addRoute($k, $v);
    }

    public function route(string $uri): callable
    {
        $get = $_GET;//массив с возможными гет-параметрами
        $uri = parse_url($uri, PHP_URL_PATH);//убрал гет-параметры из урла

        foreach ($this->routes as $k => $v) {//ищу в доступных роутах нужный калбэк
            if (0 == strcmp($uri, $k)) {//если нашел роут

                if (sizeof($get) > 0) {//смотрю размер гет-массива - если не ноль,
                    // заполняю $params через рефлексию
                    if (is_object($this->routes[$k][0])) {
                        $className = get_class($this->routes[$k][0]);
                        $reflect = new \ReflectionClass($className);
                        $arrayOfParams = $reflect->getMethod($this->routes[$k][1])->getParameters();//массив объектов-методов
                        foreach ($arrayOfParams as $val)//цикл по параметрам метода
                        {
                            $searchName = $val->getName();//текущее имя параметра для поиска в гет-массиве
                            foreach ($get as $key => $value) {
                                if ($key == $searchName) {
                                    $this->params = array_merge($this->params, [$value]);
                                }
                            }
                        }
                    }
                }
                return $v;//всегда даю возврат калбэка
            }
        }
        return throw new \Exception("no action found for $uri ");
    }

    public function addRoute(string $path, $action): void
    {
        $this->routes[$path] = $action;
    }

    public function getParams(): array
    {
        return $this->params;
    }

}