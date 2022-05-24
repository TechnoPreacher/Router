<?php

namespace Ns\Router;

class ex extends \Exception
{
    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

}