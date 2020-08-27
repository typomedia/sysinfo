<?php

namespace Typomedia\Sysinfo\Provider;

use Typomedia\Sysinfo\Repository\PosixRepository;

class BsdProvider extends AbstractBsdProvider
{
    /**
     * @inheritdoc
     */
    public function getCpuModel()
    {
        $sysctl = PosixRepository::getSysctl('hw.model');
        return $sysctl['hw.model'] ?? null;
    }
}
