<?php

namespace Larawise\Packagify\Discovery;

use Illuminate\Foundation\AliasLoader;

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
trait Assets
{
    /**
     * Discovers and publish package assets.
     *
     * @return void
     */
    protected function discoverAssets()
    {
        // Skip asset discovering if the package doesn't declare assets.
        if (! $this->package->options['hasAssets'] && ! $this->app->runningInConsole()) {
            return;
        }

        // Resolve the source path of the package's assets.
        $path = $this->app->joinPaths($this->package->path, 'resources/assets');

        // Resolve the target path where assets should be published.
        $publish = config('packagify.paths.assets');

        // Register the asset publishing group using Laravel's `publishes()` method.
        $this->publishes([$path => $publish], "{$this->package->shortName()}-assets");
    }
}
