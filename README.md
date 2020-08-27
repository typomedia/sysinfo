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
use Typomedia\Sysinfo\ProviderFactory;
use Typomedia\Sysinfo\Exception\UnsupportedSystemException;

/**
 * @var Composer\Autoload\ClassLoader $loader
 */
require __DIR__ . '/vendor/autoload.php';

$start = microtime(true);

try {
    $provider = ProviderFactory::create();
    print 'OsType: ' . $provider->getOsType() . PHP_EOL;
    print 'OsRelease: ' . $provider->getOsRelease() . PHP_EOL;
    print 'OsKernelVersion: ' . $provider->getOsKernelVersion() . PHP_EOL;
    print 'Architecture: ' . $provider->getArchitecture() . PHP_EOL;
    print 'Hostname: ' . $provider->getHostname() . PHP_EOL;
    print 'CpuModel: ' . $provider->getCpuModel() . PHP_EOL;
    print 'CpuCores: ' . $provider->getCpuCores() . PHP_EOL;
    print 'PhpVersion: ' . $provider->getPhpVersion() . PHP_EOL;
    print 'TotalMem: ' . $provider->getTotalMem() . PHP_EOL;
    print 'DiskTotal: ' . $provider->getDiskTotal() . PHP_EOL;
    print 'DiskUsage: ' . $provider->getDiskUsage() . PHP_EOL;
    print 'DiskFree: ' . $provider->getDiskFree() . PHP_EOL;
} catch (UnsupportedSystemException $e) {
    print $e->getMessage() . PHP_EOL;
}

$end  = microtime(true);
$time = round(($end - $start) * 1000);
print $time . ' ms' . PHP_EOL;
```
