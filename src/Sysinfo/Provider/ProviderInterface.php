<?php

namespace Typomedia\Sysinfo\Provider;

interface ProviderInterface
{
    /**
     * @return string
     */
    public function getOsType();

    /**
     * @return mixed
     */
    public function getOsRelease();

    /**
     * @return mixed
     */
    public function getOsKernelVersion();

    /**
     * @return string
     */
    public function getArchitecture();

    /**
     * @return string
     */
    public function getHostname();

    /**
     * @return mixed
     */
    public function getCpuModel();

    /**
     * @return mixed
     */
    public function getCpuCores();

    /**
     * @return mixed
     */
    public function getDiskTotal();

    /**
     * @return mixed
     */
    public function getDiskUsage();

    /**
     * @return mixed
     */
    public function getDiskFree();

    /**
     * @return mixed
     */
    public function getTotalMem();

    /**
     * @return string
     */
    public function getPhpVersion();
}
