<?php

namespace Ns\Router;

class HttpExceptionAction extends HttpException
{
    protected $message='action not found for this route';
    protected $code=431;
}