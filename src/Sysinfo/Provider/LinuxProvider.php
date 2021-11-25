<?php

namespace Typomedia\Sysinfo\Provider;

use Typomedia\Sysinfo\Repository\LinuxRepository;

class LinuxProvider extends AbstractProvider
{
    /**
     * @inheritdoc
     */
    public function getOsRelease()
    {
        return @parse_ini_file('/etc/os-release')['PRETTY_NAME'];
    }

    /**
     * @inheritdoc
     */
    public function getOsKernelVersion()
    {
        return php_uname('r');
    }

    /**
     * @inheritdoc
     */
    public function getCpuModel()
    {
        $cpuinfo = LinuxRepository::getCpuInfo();
        return $cpuinfo['model name'] ?? null;
    }

    /**
     * @inheritdoc
     */
    public function getCpuCores()
    {
        $cpuinfo = LinuxRepository::getCpuInfo();
        return $cpuinfo['cpu cores'] ? (int)$cpuinfo['cpu cores'] : null;
    }

    /**
     * @inheritdoc
     */
    public function getTotalMem()
    {
        $meminfo = LinuxRepository::getMemInfo();
        return $meminfo['MemTotal'] ? (int)$meminfo['MemTotal'] * 1024 : null;
    }
}
