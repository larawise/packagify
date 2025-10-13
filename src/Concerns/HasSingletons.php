<?php

namespace Larawise\Packagify\Concerns;

use Closure;

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
trait HasSingletons
{
    /**
     * The package singletons' storage.
     *
     * @var array<string, string>
     */
    public $singletons = [];

    /**
     * Enable singletons discovery for the `Packagify` package.
     *
     * @param Closure|string|array $abstract
     * @param Closure|string|null $concrete
     *
     * @return $this
     */
    public function hasSingletons($abstract, $concrete = null)
    {
        // Set the alias discovery option to true for Packagify.
        $this->option(
            key: 'hasSingletons',
            value: true
        );

        if (is_string($abstract)) {
            $abstract = [$abstract => $concrete];
        }

        // Merge new singletons with the existing ones
        $this->singletons = array_merge($this->singletons, $abstract);

        return $this;
    }
}
