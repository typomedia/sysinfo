<?php

namespace Typomedia\Sysinfo\Provider;

use Typomedia\Sysinfo\Repository\PosixRepository;

abstract class AbstractBsdProvider extends AbstractProvider
{
    /**
     * @inheritdoc
     */
    public function getOsRelease()
    {
        return trim(shell_exec('uname -rs'));
    }

    /**
     * @inheritdoc
     */
    public function getOsKernelVersion()
    {
        return php_uname('r');
    }

    /**
     * @inheritDoc
     */
    public function getCpuCores()
    {
        $sysctl = PosixRepository::getSysctl('hw.ncpu');
        return $sysctl['hw.ncpu'] ? (int)$sysctl['hw.ncpu'] : null;
    }

    /**
     * @inheritDoc
     */
    public function getTotalMem()
    {
        $sysctl = PosixRepository::getSysctl('hw.physmem');
        return $sysctl['hw.physmem'] ? (int)$sysctl['hw.physmem'] : null;
    }
}
