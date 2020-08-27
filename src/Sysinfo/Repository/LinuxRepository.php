<?php

namespace Typomedia\Sysinfo\Repository;

class LinuxRepository
{
    /**
     * @return array
     */
    public static function getCpuInfo()
    {
        $cpuinfo = [];
        $lines = file('/proc/cpuinfo');
        foreach ($lines as $line) {
            $values = array_map('trim', explode(':', $line));
            if (isset($values[0], $values[1])) {
                $cpuinfo[$values[0]] = $values[1];
            }
        }
        return $cpuinfo;
    }

    /**
     * @return array
     */
    public static function getMemInfo()
    {
        $meminfo = [];
        $lines = file('/proc/meminfo');
        foreach ($lines as $line) {
            $values = array_map('trim', explode(':', $line));
            if (isset($values[0], $values[1])) {
                $meminfo[$values[0]] = $values[1];
            }
        }
        return $meminfo;
    }
}
