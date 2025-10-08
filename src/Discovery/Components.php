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
trait Components
{
    /**
     * Discover and manage view components.
     *
     * @return void
     */
    protected function discoverComponents()
    {
        // Check if the package has components enabled.
        if (! $this->package->options['hasComponents']) {
            // If components are not enabled, exit the method.
            return;
        }

        // Iterate through the package components and register them with the Blade compiler.
        foreach ($this->package->components as $prefix => $namespace) {
            // Register class-based components with a specific prefix and namespace.
            if (is_string($prefix) && ! is_array($namespace) && class_exists($namespace)) {
                $this->app['blade.compiler']->component($namespace, $prefix);
            }

            // Register namespaced class-based components.
            if (is_string($prefix) && ! File::isDirectory($namespace) && $this->package->asClassBasedComponents) {
                $this->app['blade.compiler']->componentNamespace($namespace, $prefix);
            }

            // Register anonymous components located in a directory.
            if (is_string($prefix) && File::isDirectory($namespace) && $this->package->asAnonymousComponents) {
                $this->app['blade.compiler']->anonymousComponentPath($namespace, $prefix);
            }

            // Register components when the namespace is an array of aliases and component class names.
            if (is_string($prefix) && is_array($namespace)) {
                foreach ($namespace as $alias => $component) {
                    $this->app['blade.compiler']->component($component, is_string($alias) ? $alias : null, $prefix);
                }
            }
        }
    }
}
