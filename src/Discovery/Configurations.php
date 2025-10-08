<?php

namespace Larawise\Packagify\Discovery;

use Illuminate\Support\Facades\File;

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
trait Configurations
{
    /**
     * Discover and manage package configurations.
     *
     * @return void
     */
    protected function discoveryConfigurations()
    {
        // Check if the package has configurations enabled.
        if (! $this->package->options['hasConfigurations']) {
            return;
        }

        // Determine the paths for the configurations within the package and publication path.
        $path = $this->app->joinPaths($this->package->path, 'config');
        $publish = config('packagify.paths.configurations');

        // Merge each configuration file from the package path.
        foreach ($this->package->configurations as $file) {
            if (File::exists($target = $this->app->joinPaths($this->package->path, "config/$file.php"))) {
                $this->mergeConfigFrom($target, $file);
            }
        }

        // If the application is running in the console, publish the configurations.
        if ($this->app->runningInConsole()) {
            $this->publishes([$path => $publish], "{$this->package->shortName()}-config");
        }
    }
}
