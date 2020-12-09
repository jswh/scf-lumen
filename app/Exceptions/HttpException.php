<?php

namespace App\Exceptions;

class HttpException extends \Exception
{
    public function __construct($code, $msg = '')
    {
        $this->code = $code;
        $this->msg = $msg;
    }
}
