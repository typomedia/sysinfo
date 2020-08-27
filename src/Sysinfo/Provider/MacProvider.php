<?php

namespace Typomedia\Sysinfo\Provider;

use Typomedia\Sysinfo\Repository\PosixRepository;

class MacProvider extends AbstractBsdProvider
{
    /**
     * @inheritdoc
     */
    public function getCpuModel()
    {
        $sysctl = PosixRepository::getSysctl('machdep.cpu.brand_string');
        return $sysctl['machdep.cpu.brand_string'] ?? null;
    }
}
