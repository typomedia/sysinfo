<?php

namespace Typomedia\Sysinfo\Exception;

use Exception;

class UnsupportedMethodException extends Exception
{
    protected $message = 'Method is not implemented in this provider';
}
