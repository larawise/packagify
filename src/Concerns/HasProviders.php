<?php

namespace Larawise\Packagify\Concerns;

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
trait HasProviders
{
    /**
     * The package service provider storage.
     *
     * @var string[]
     */
    public $providers = [];

    /**
     * Enable service provider discovery for the `Packagify` package.
     *
     * @param string|array $providers
     *
     * @return $this
     */
    public function hasProviders($providers)
    {
        // Set the service provider discovery option to true for Packagify.
        $this->option(
            key: 'hasProviders',
            value: true
        );

        // Convert providers to array if not already
        $providers = is_array($providers) ? $providers : [$providers];

        // Assign providers
        $this->providers = $providers;

        return $this;
    }
}
