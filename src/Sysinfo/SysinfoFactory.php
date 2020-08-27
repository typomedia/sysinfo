<?php

namespace Typomedia\Sysinfo;

use Typomedia\Sysinfo\Provider\BsdProvider;
use Typomedia\Sysinfo\Provider\LinuxProvider;
use Typomedia\Sysinfo\Provider\MacProvider;
use Typomedia\Sysinfo\Provider\WindowsProvider;
use Typomedia\Sysinfo\Exception\UnsupportedSystemException;

class SysinfoFactory
{
    /**
     * @return BsdProvider|LinuxProvider|MacProvider|WindowsProvider
     * @throws UnsupportedSystemException
     */
    public static function create()
    {
        switch (strtolower(PHP_OS)) {
            case 'darwin':
                $provider = new MacProvider();
                break;
            case 'freebsd':
                $provider = new BsdProvider();
                break;
            case 'linux':
                $provider = new LinuxProvider();
                break;
            case 'winnt':
                $provider = new WindowsProvider();
                break;
            default:
                throw new UnsupportedSystemException();
        }
        return $provider;
    }
}
