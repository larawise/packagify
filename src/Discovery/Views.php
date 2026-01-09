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
trait Views
{
    /**
     * Discover and manage package views.
     *
     * @return void
     */
    protected function discoverViews()
    {
        // Skip view discovering if the package doesn't declare views.
        if (! $this->package->options['hasViews']) {
            return;
        }

        // Load views from the specified paths and namespaces.
        foreach ($this->viewPaths() as $namespace => $path) {
            // Register a view file namespace for application.
            $this->loadViewsFrom($path, $namespace);
        }

        // If the application is running in the console, publish the views.
        if ($this->app->runningInConsole()) {
            // Determine the publishing path for the views.
            $publishPath = $this->app->joinPaths(config('packagify.paths.views'), $this->package->namespace());

            // Register paths to be published by the publish command.
            $this->publishes([$this->path('resources/views') => $publishPath], "{$this->package->shortName()}-views");
        }
    }

    /**
     * Get the namespace paths for views.
     *
     * @return array
     */
    protected function viewPaths()
    {
        $paths = [];

        // Check if the viewNamespace is an array.
        if (is_array($this->package->viewNamespace)) {
            // Iterate through the namespace and folder mappings.
            foreach ($this->package->viewNamespace as $namespace => $folder) {
                $paths[$namespace] = $this->app->joinPaths($this->package->path, "resources/views/{$folder}");
            }
        } else {
            // Use the package's short name if viewNamespace is null.
            $namespace = $this->package->viewNamespace ?: $this->package->shortName();
            $paths[$namespace] = $this->app->joinPaths($this->package->path, 'resources/views');
        }

        return $paths;
    }
}
