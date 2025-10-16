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
trait HasViews
{
    /**
     * The package view namespace.
     *
     * @var string|array|null
     */
    public $viewNamespace = null;

    /**
     * Enable view discovery for the `Packagify` package.
     *
     * @param string|array|null $namespace
     *
     * @return $this
     */
    public function hasViews($namespace = null)
    {
        // Set the view discovery option to true for Packagify.
        $this->option(
            key: 'hasViews',
            value: true
        );

        // Assign the view namespace
        $this->viewNamespace = $namespace;

        return $this;
    }
}
