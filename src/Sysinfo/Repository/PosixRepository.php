<?php

namespace Typomedia\Sysinfo\Repository;

class PosixRepository
{
    /**
     * @param string $name
     * @return array
     */
    public static function getSysctl($name)
    {
        $sysctl = [];
        $lines = explode(PHP_EOL, shell_exec("sysctl $name"));
        foreach ($lines as $line) {
            $values = array_map('trim', explode(':', $line));
            if (isset($values[0], $values[1])) {
                $sysctl[$values[0]] = $values[1];
            }
        }
        return $sysctl;
    }
}
