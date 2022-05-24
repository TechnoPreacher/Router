<?php

namespace Ns\Router;

class HttpExceptionAction extends HttpException
{
    protected $code=431;
    protected $message='action not found for this route';
}