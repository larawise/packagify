<?php

namespace Larawise\Packagify\Discovery;

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
trait Lifecycle
{
    /**
     * Perform actions before the package is registered.
     *
     * @return void
     */
    public function packageRegistering()
    {
        // This function can be used to add any logic before registering the package.
    }

    /**
     * Perform actions after the package is registered.
     *
     * @return void
     */
    public function packageRegistered()
    {
        // This function can be used to add any logic after registering the package.
    }

    /**
     * Perform actions before the package is booted.
     *
     * @return void
     */
    public function packageBooting()
    {
        // This function can be used to add any logic before booting the package.
    }

    /**
     * Perform actions after the package is booted.
     *
     * @return void
     */
    public function packageBooted()
    {
        // This function can be used to add any logic after booting the package.
    }
}
