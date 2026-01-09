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
trait Bindings
{
    /**
     * Discovers and registers package bindings.
     *
     * @return void
     */
    protected function discoverBindings()
    {
        // Skip alias discovering if the package doesn't declare singletons.
        if (! $this->package->options['hasBindings']) {
            return;
        }

        // Register singletons in the application.
        foreach ($this->package->bindings as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }
}
