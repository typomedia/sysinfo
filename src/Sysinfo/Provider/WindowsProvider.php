<?php

namespace Typomedia\Sysinfo\Provider;

class WindowsProvider extends AbstractProvider
{
    /**
     * @inheritDoc
     */
    public function getOsRelease()
    {
        preg_match('/\((.*)\)/', php_uname('a'), $matches);
        return $matches[1] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function getOsKernelVersion()
    {
        return php_uname('r');
    }

    /**
     * @inheritDoc
     */
    public function getCpuModel()
    {
        $wmic = explode(PHP_EOL, shell_exec('WMIC Cpu get Name'));
        return $wmic[1] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function getCpuCores()
    {
        $wmic = explode(PHP_EOL, shell_exec('WMIC Cpu get NumberOfCores'));
        return $wmic[1] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function getTotalMem()
    {
        $wmic = explode(PHP_EOL, shell_exec('WMIC ComputerSystem get TotalPhysicalMemory'));
        return $wmic[1] ?? null;
    }
}
