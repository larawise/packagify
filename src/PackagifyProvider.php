<?php

namespace Larawise\Packagify;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use Larawise\Packagify\Exceptions\PackagifyException;

/**
 * Srylius - The ultimate symphony for technology architecture!
 *
 * @package     Larawise
 * @subpackage  Packagify
 * @version     v0.0.1
 * @author      Selçuk Çukur <hk@selcukcukur.com.tr>
 * @copyright   Srylius Teknoloji Limited Şirketi
 *
 * @see https://docs.larawise.com/ Larawise : Docs
 */
abstract class PackagifyProvider extends ServiceProvider
{
    // Discovery
    use Discovery\Lifecycle;

    /**
     * The packagify package.
     *
     * @var Packagify
     */
    protected $package;

    /**
     * The packagify prefix.
     *
     * @var Packagify
     */
    protected $prefix;

    /**
     * The filesystem implementation.
     *
     * @var Filesystem
     */
    protected $files;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Hook for any actions before booting the package.
        $this->packageBooting();

        // Discover all application services for the package.
        $this->discovery();

        // Hook for any actions after booted the package.
        $this->packageBooted();
    }

    /**
     * Configure the packagify package.
     *
     * @param Packagify $package
     *
     * @return void
     */
    abstract public function configure(Packagify $package);

    /**
     * Discovery for the all services provided package.
     *
     * @return void
     */
    protected function discovery()
    {
        $concerns = [

        ];

        foreach ($concerns as $target) {
            $this->{'discover'.ucfirst($target)}();
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     * @throws PackagifyException
     */
    public function register()
    {
        // Hook for any actions before registering the package.
        $this->packageRegistering();

        // Initialize the Packagify instance and set its properties.
        $this->package = new Packagify;

        // Configure and validate the package.
        $this->configure($this->package);
        $this->validate($this->package);

        // Hook for any actions after registering the package.
        $this->packageRegistered();
    }

    /**
     * Validate the packagify package.
     *
     * @param Packagify $package
     *
     * @return void
     * @throws PackagifyException
     */
    protected function validate($package)
    {
        if (empty($package->name)) {
            throw new PackagifyException('This package does not have a name. You can set one with `$package->name("example")');
        }

        if (empty($package->description)) {
            throw new PackagifyException('This package does not have a description. You can set one with `$package->description("Example Description")');
        }

        if (empty($package->version)) {
            throw new PackagifyException('This package does not have a version. You can set one with `$package->version("0.0.1")');
        }

        if (empty($package->prefix)) {
            throw new PackagifyException('This package does not have a prefix. You can set one with `$package->prefix("larawise/")');
        }
    }
}
