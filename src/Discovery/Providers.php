<?php

namespace Larawise\Packagify\Discovery;

/**
 * Srylius - We build experiences — digital, physical, and everything in between.
 *
 * @package     Larawise
 * @subpackage  Packagify
 * @version     v1.0.0
 * @author      Selçuk Çukur <selcukcukur@outlook.com.tr>
 * @copyright   Srylius Teknoloji Limited Şirketi
 *
 * @see https://docs.larawise.com/ Larawise : Docs
 */
trait Providers
{
    /**
     * Discover and manage package providers.
     *
     * @return void
     */
    protected function discoverProviders()
    {
        // Skip provider discovering if the package doesn't declare providers.
        if (! $this->package->options['hasProviders']) {
            return;
        }

        // Register each provider in the package.
        foreach ($this->package->providers as $provider) {
            $this->app->register($provider);
        }

        // Determine the paths for the configurations within the package and publication path.
        $path = $this->app->joinPaths($this->package->path, 'stubs/package');
        $publish = config('packagify.paths.providers');

        // If the application is running in the console, publish the configurations.
        if ($this->app->runningInConsole()) {
            $this->publishes([$path => $publish], "{$this->package->shortName()}-providers");
        }
    }
}
