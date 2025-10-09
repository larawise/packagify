<?php

namespace Larawise\Packagify;

use Illuminate\Database\Migrations\MigrationCreator;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Traits\Macroable;
use Larawise\Packagify\Exceptions\PackagifyException;
use ReflectionClass;
use Symfony\Component\Finder\Finder;

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
    use Discovery\Assets,
        Discovery\Aliases,
        Discovery\Commands,
        Discovery\Components,
        Discovery\Composers,
        Discovery\Configurations,
        Discovery\Helpers,
        Discovery\Lifecycle,
        Discovery\Macros,
        Discovery\Migrations,
        Discovery\Providers,
        Discovery\Routes,
        Discovery\Translations,
        Discovery\Views,
        Macroable;

    /**
     * The migration creator implementation.
     *
     * @var MigrationCreator
     */
    protected $creator;

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
     * Get or create a migration creator instance.
     *
     * @return MigrationCreator
     */
    protected function creator()
    {
        return $this->creator ??= new MigrationCreator($this->files(), $this->path('stubs/database'));
    }

    /**
     * Discovery for the all services provided package.
     *
     * @return void
     */
    protected function discovery()
    {
        $provideable = [
            'Helpers',
            'Translations',
            'Routes',
            'Providers',
            'Aliases',
            'Macros',
            'Commands',
            'Components',
            'Migrations',
            'Views',
            'Composers',
        ];

        foreach ($provideable as $target) {
            $this->{"discover{$target}"}();
        }
    }

    /**
     * Get or create a Filesystem instance.
     *
     * @return Filesystem
     */
    protected function files()
    {
        // Check if $this->files is already set. If so, return it. Otherwise, create and set a new Filesystem instance.
        return $this->files ?: $this->files = new Filesystem;
    }

    /**
     * Create and configure a Finder instance to search for files or directories.
     *
     * @param string $name
     * @param string $target
     *
     * @return Finder
     */
    protected function finder($name, $target = 'files')
    {
        // Create a new Finder instance and configure it based on the provided parameters.
        return (new Finder)->$target()->in($this->path())->name($name);
    }

    /**
     * Get the current directory path of a packagify package.
     *
     * @param string $path
     *
     * @return string
     */
    protected function path($path = '')
    {
        // Use ReflectionClass to get the file name of the current class.
        $reflector = new ReflectionClass($this);

        // Get the parent directory of the src folder.
        $basePath = dirname($reflector->getFileName(), 2);

        // Concatenate the cleaned-up path with the optional parameter $path.
        return $basePath . ($path ? DIRECTORY_SEPARATOR . ltrim($path, DIRECTORY_SEPARATOR) : '');
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
        $this->package->path($this->path());

        // Configure and validate the package.
        $this->configure($this->package);
        $this->validate($this->package);

        // Discover and manage package configurations.
        $this->discoveryConfigurations();

        // Set the package prefix, using the config value or a default.
        $this->prefix = $this->package->prefix ??= config('packagify.prefix', $this->prefix);

        // Hook for any actions after registering the package.
        $this->packageRegistered();

        // Check if the shared instance of the Packagify packages should be registered in the container.
        if (config('packagify.bindings')) {
            // Register the instance of the package in the container with a dotted namespace.
            $this->app->instance($this->package->namespace('dotted'), $this->package);
        }
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
