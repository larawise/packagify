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
        // ...
    }

    /**
     * Perform actions after the package is registered.
     *
     * @return void
     */
    public function packageRegistered()
    {
        // ...
    }

    /**
     * Perform actions before the package is booted.
     *
     * @return void
     */
    public function packageBooting()
    {
        // ...
    }

    /**
     * Perform actions after the package is booted.
     *
     * @return void
     */
    public function packageBooted()
    {
        // ...
    }
}
