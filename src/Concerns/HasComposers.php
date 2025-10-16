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
trait HasComposers
{
    /**
     * The package view composer storage.
     *
     * @var array<string, mixed>
     */
    public $viewComposers = [];

    /**
     * Enable composer discovery for the `Packagify` package.
     *
     * @param string|array $view
     * @param mixed $composer
     *
     * @return $this
     */
    public function hasComposers($view, $composer)
    {
        // Set the composer discovery option to true for Packagify.
        $this->option(
            key: 'hasComposers',
            value: true
        );

        // If view is not an array, convert it to an array with the composer
        if (! is_array($view)) {
            $view = [$view => $composer];
        }

        // Assign each view to its composer
        foreach ($view as $v => $c) {
            $this->viewComposers[$v] = $c;
        }

        return $this;
    }
}
