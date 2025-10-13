<?php

namespace Larawise\Packagify\Discovery;

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
trait Singletons
{
    /**
     * Discovers and registers package singletons.
     *
     * @return void
     */
    protected function discoverSingletons()
    {
        // Skip alias discovering if the package doesn't declare singletons.
        if (! $this->package->options['hasSingletons']) {
            return;
        }

        // Register singletons in the application.
        foreach ($this->package->singletons as $abstract => $concrete) {
            $this->app->singleton($abstract, $concrete);
        }
    }
}
