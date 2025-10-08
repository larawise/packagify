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
trait HasViews
{
    /**
     * The package view namespace.
     *
     * @var string|array|null
     */
    public $viewNamespace = null;

    /**
     * Sets the hasViews option and assigns the view namespace.
     *
     * @param string|array|null $namespace The view namespace
     *
     * @return $this Returns the current instance for chaining.
     */
    public function hasViews($namespace = null)
    {
        // Set the hasViews option to true
        $this->option(
            key: 'hasViews',
            value: true
        );

        // Assign the view namespace
        $this->viewNamespace = $namespace;

        return $this;
    }
}
