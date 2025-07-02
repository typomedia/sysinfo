<?php

namespace Typomedia\Sysinfo\Provider;

class WindowsProvider extends AbstractProvider
{
    /**
     * @inheritDoc
     */
    public function getOsRelease()
    {
        $cim = shell_exec('powershell.exe -NoProfile -Command "Get-CimInstance -ClassName Win32_OperatingSystem | Select-Object -ExpandProperty Caption"');
        return $cim ?? null;
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
        $cim = shell_exec('powershell.exe -NoProfile -Command "Get-CimInstance -ClassName Win32_Processor | Select-Object -ExpandProperty Name"');
        return $cim ?? null;
    }

    /**
     * @inheritDoc
     */
    public function getCpuCores()
    {
        $cim = shell_exec('powershell.exe -NoProfile -Command "Get-CimInstance -ClassName Win32_Processor | Select-Object -ExpandProperty NumberOfLogicalProcessors"');
        return $cim ? (int)$cim : null;
    }

    /**
     * @inheritDoc
     */
    public function getTotalMem()
    {
        $cim = shell_exec('powershell.exe -NoProfile -Command "Get-CimInstance -ClassName Win32_ComputerSystem | Select-Object -ExpandProperty TotalPhysicalMemory"');
        return $cim ? (int)$cim : null;
    }
}
