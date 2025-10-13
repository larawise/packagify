<?php

namespace Larawise\Packagify\Concerns;

use Closure;

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
trait HasBindings
{
    /**
     * The package bindings' storage.
     *
     * @var array<string, string>
     */
    public $bindings = [];

    /**
     * Enable bindings discovery for the `Packagify` package.
     *
     * @param Closure|string|array $abstract
     * @param Closure|string|null $concrete
     *
     * @return $this
     */
    public function hasBindings($abstract, $concrete = null)
    {
        // Set the alias discovery option to true for Packagify.
        $this->option(
            key: 'hasBindings',
            value: true
        );

        if (is_string($abstract)) {
            $abstract = [$abstract => $concrete];
        }

        // Merge new singletons with the existing ones
        $this->bindings = array_merge($this->bindings, $abstract);

        return $this;
    }
}
