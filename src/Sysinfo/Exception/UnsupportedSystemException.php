<?php

namespace Typomedia\Sysinfo\Exception;

use Exception;

class UnsupportedSystemException extends Exception
{
    protected $message = 'Operating system is not supported';
}
