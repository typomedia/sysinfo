# System Information Library

Cross-platform Library providing system and hardware information.

The Library is [PSR-1](https://www.php-fig.org/psr/psr-1/), [PSR-4](https://www.php-fig.org/psr/psr-4/), [PSR-12](https://www.php-fig.org/psr/psr-12/) compliant.

## Compatibility
- Linux
- FreeBSD
- MacOS
- Windows

## Requirements

- `>= PHP 7.2`

## Dependencies

- `none`

## Install

```
composer require typomedia/sysinfo
```

## Usage

```php
use Typomedia\Sysinfo\SysinfoFactory;
use Typomedia\Sysinfo\Exception\UnsupportedSystemException;

/**
 * @var Composer\Autoload\ClassLoader $loader
 */
require __DIR__ . '/vendor/autoload.php';

$start = microtime(true);

try {
    $sysinfo = SysinfoFactory::create();
    $values['OsType'] = $sysinfo->getOsType();
    $values['OsRelease'] = $sysinfo->getOsRelease();
    $values['OsKernelVersion'] = $sysinfo->getOsKernelVersion();
    $values['Architecture'] = $sysinfo->getArchitecture();
    $values['Hostname'] = $sysinfo->getHostname();
    $values['CpuModel'] = $sysinfo->getCpuModel();
    $values['CpuCores'] = $sysinfo->getCpuCores();
    $values['PhpVersion'] = $sysinfo->getPhpVersion();
    $values['TotalMem'] = $sysinfo->getTotalMem();
    $values['DiskTotal'] = $sysinfo->getDiskTotal();
    $values['DiskUsage'] = $sysinfo->getDiskUsage();
    $values['DiskFree'] = $sysinfo->getDiskFree();
} catch (UnsupportedSystemException $e) {
    $values['Exception'] = $e->getMessage();
}

foreach ($values as $key => $value) {
    print $key . ': ' . $value . PHP_EOL;
}

$end  = microtime(true);
$time = round(($end - $start) * 1000);
print $time . ' ms' . PHP_EOL;
```

## Output

```
OsType: Linux
OsRelease: Ubuntu 16.04.6 LTS
OsKernelVersion: 4.15.0-112-generic
Architecture: x86_64
Hostname: spaceballs
CpuModel: Intel(R) Core(TM) i7-3667U CPU @ 2.00GHz
CpuCores: 2
PhpVersion: 7.4.7
TotalMem: 8043172
DiskTotal: 117981093888
DiskUsage: 111017865216
DiskFree: 6963228672
```
