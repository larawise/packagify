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
trait Commands
{
    /**
     * Discover and manage package commands.
     *
     * @return void
     */
    protected function discoverCommands()
    {
        // Skip command discovering if the package doesn't declare commands.
        if (! $this->package->options['hasCommands'] && ! $this->app->runningInConsole()) {
            return;
        }

        // Register commands if the application is running in the console.
        $this->commands($this->package->commands);
    }
}
