<?php

namespace Larawise\Packagify\Discovery;

use Illuminate\Support\Facades\File;

/**
 * Srylius - The ultimate symphony for technology architecture!
 *
 * @package     Larawise
 * @subpackage  Packagify
 * @version     v1.0.0
 * @author      Selçuk Çukur <hk@selcukcukur.com.tr>
 * @copyright   Srylius Teknoloji Limited Şirketi
 *
 * @see https://docs.larawise.com/ Larawise : Docs
 */
trait Configurations
{
    /**
     * Discover and manage package configurations.
     *
     * @return void
     */
    protected function discoveryConfigurations()
    {
        // Skip configuration discovering if the package doesn't declare configurations.
        if (! $this->package->options['hasConfigurations']) {
            return;
        }

        // Determine the paths for the configurations within the package and publication path.
        $path = $this->app->joinPaths($this->package->path, 'config');
        $publish = config('packagify.paths.configurations');

        // Merge each configuration file from the package path.
        foreach ($this->package->configurations as $file) {
            // Path to the published config file (e.g. config/foo.php)
            $published = $this->app->joinPaths($publish, "$file.php");

            // Path to the package config file inside the package (e.g. vendor/package/config/foo.php)
            $default = $this->app->joinPaths($this->package->path, "config/$file.php");

            // If the selected config file exists, merge it into the application configuration
            if (! File::exists($published) && File::exists($default)) {
                $this->mergeConfigFrom($default, $file);
            }
        }

        // If the application is running in the console, publish the configurations.
        if ($this->app->runningInConsole()) {
            $this->publishes([$path => $publish], "{$this->package->shortName()}-config");
        }
    }
}
