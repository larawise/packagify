<?php

namespace Larawise\Packagify\Discovery;

use Illuminate\Support\Facades\Route;
use Srylius\Facades\Srylius;

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
trait Routes
{
    /**
     * Discover and manage package routes.
     *
     * @return void
     */
    protected function discoverRoutes()
    {
        // Check if the package has routes enabled.
        if (! $this->package->options['hasRoutes']) {
            return;
        }

        // Load routes from the specified path and namespace.
        foreach ($this->package->routes as $file) {
            // Load the given routes file if routes are not already cached.
            $this->loadRoutesFrom($this->app->joinPaths($this->package->path, "routes/$file.php"));
        }
    }
}
