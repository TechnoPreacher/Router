<?php

namespace Ns\Router;




class HttpException extends \Exception
{
    protected $message="common HTTP exception";
    protected $code=499;
}