<?php

namespace Ns\Router;

class SomeClass
{
    public static function view()
    {
        echo "method from some class";
    }

    public function view2(int $id = 0, string $foo = '3', int $ru = 8)
    {
        echo "view2 method from some class" . "</br>";

        echo "values of params (changed if get-request is set):" .
            " id = " . $id . "; foo = " . $foo . " ru = " . $ru . "</br>";//"method 2222 from some class";
    }
}