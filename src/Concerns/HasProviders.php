<?php

namespace Larawise\Packagify\Concerns;

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
trait HasProviders
{
    /**
     * The package providers.
     *
     * @var string[]
     */
    public $providers = [];

    /**
     * Sets the hasProviders option and assigns providers.
     *
     * @param string|array $providers The providers to be added
     *
     * @return $this Returns the current instance for chaining.
     */
    public function hasProviders($providers)
    {
        // Set the hasProviders option to true
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
