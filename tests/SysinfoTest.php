<?php

namespace Typomedia\Sysinfo;

use PHPUnit\Framework\TestCase;

class SysinfoTest extends TestCase
{
    /**
     * @var Provider\BsdProvider|Provider\LinuxProvider|Provider\MacProvider|Provider\WindowsProvider
     */
    protected $sysinfo;

    protected function setUp() : void
    {
        try {
            $this->sysinfo = SysinfoFactory::create();
        } catch (Exception\UnsupportedSystemException $e) {
            print $e->getMessage();
        }
    }

    public function testGetOsType()
    {
        $osType = $this->sysinfo->getOsType();
        print 'OsType: ' . $osType . PHP_EOL;
        $this->assertEquals(PHP_OS_FAMILY, $osType);
    }

    public function testGetOsRelease()
    {
        $osRelease = $this->sysinfo->getOsRelease();
        print 'OsRelease: ' . $osRelease . PHP_EOL;
        $this->assertIsString($osRelease);
    }

    public function testGetOsKernelVersion()
    {
        $osKernelVersion = $this->sysinfo->getOsKernelVersion();
        print 'OsKernelVersion: ' . $osKernelVersion . PHP_EOL;
        $this->assertIsString($osKernelVersion);
    }

    public function testGetPhpVersion()
    {
        $phpVersion = $this->sysinfo->getPhpVersion();
        print 'PhpVersion: ' . $phpVersion . PHP_EOL;
        $this->assertEquals(PHP_VERSION, $phpVersion);
    }

    public function testGetArchitecture()
    {
        $architecture = $this->sysinfo->getArchitecture();
        print 'Architecture: ' . $architecture . PHP_EOL;
        $this->assertEquals(php_uname('m'), $architecture);
    }

    public function testGetTotalMem()
    {
        $totalMem = $this->sysinfo->getTotalMem();
        print 'TotalMem: ' . $totalMem . PHP_EOL;
        $this->assertIsScalar($totalMem);
        $this->assertGreaterThan(0, $totalMem);
    }

    public function testGetHostname()
    {
        $hostname = $this->sysinfo->getHostname();
        print 'Hostname: ' . $hostname . PHP_EOL;
        $this->assertEquals(php_uname('n'), $hostname);
    }

    public function testGetCpuModel()
    {
        $cpuModel = $this->sysinfo->getCpuModel();
        print 'CpuModel: ' . $cpuModel . PHP_EOL;
        $this->assertIsString($cpuModel);
    }

    public function testGetCpuCores()
    {
        $cpuCores = $this->sysinfo->getCpuCores();
        print 'CpuCores: ' . $cpuCores . PHP_EOL;
        $this->assertIsInt($cpuCores);
    }

    public function testGetDiskTotal()
    {
        $diskTotal = $this->sysinfo->getDiskTotal();
        print 'DiskTotal: ' . $diskTotal . PHP_EOL;
        $this->assertIsScalar($diskTotal);
        $this->assertGreaterThan(0, $diskTotal);
    }

    public function testGetDiskFree()
    {
        $diskFree = $this->sysinfo->getDiskFree();
        print 'DiskFree: ' . $diskFree . PHP_EOL;
        $this->assertIsScalar($diskFree);
        $this->assertGreaterThan(0, $diskFree);
    }

    public function testGetDiskUsage()
    {
        $diskUsage = $this->sysinfo->getDiskUsage();
        print 'DiskUsage: ' . $diskUsage . PHP_EOL;
        $this->assertIsScalar($diskUsage);
        $this->assertGreaterThan(0, $diskUsage);
    }
}
