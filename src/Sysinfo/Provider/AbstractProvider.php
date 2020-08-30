<?php

namespace Typomedia\Sysinfo\Provider;

abstract class AbstractProvider implements ProviderInterface
{
    /**
     * @inheritdoc
     */
    public function getOsType()
    {
        return PHP_OS_FAMILY;
    }

    /**
     * @inheritdoc
     */
    public function getHostname()
    {
        return php_uname('n');
    }

    /**
     * @inheritdoc
     */
    public function getArchitecture()
    {
        return php_uname('m');
    }

    /**
     * @inheritdoc
     */
    public function getDiskTotal()
    {
        return disk_total_space(DIRECTORY_SEPARATOR);
    }

    /**
     * @inheritdoc
     */
    public function getDiskUsage()
    {
        return ($this->getDiskTotal() - $this->getDiskFree());
    }

    /**
     * @inheritdoc
     */
    public function getDiskFree()
    {
        return disk_free_space(DIRECTORY_SEPARATOR);
    }

    /**
     * @inheritdoc
     */
    public function getPhpVersion()
    {
        return PHP_VERSION;
    }
}
