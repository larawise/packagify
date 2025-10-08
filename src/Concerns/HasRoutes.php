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
trait HasRoutes
{
    /**
     * The package route files.
     *
     * @var string[]
     */
    public $routes = [];

    /**
     * Sets the hasRoutes option and assigns route files.
     *
     * @param string|array $files
     *
     * @return $this
     */
    public function hasRoutes($files = [])
    {
        // Set the hasRoutes option to true
        $this->option(
            key: 'hasRoutes',
            value: true
        );

        // Convert files to array if not already
        $files = is_array($files) ? $files : [$files];

        // Assign routes, defaulting to the short name if files are empty
        $this->routes = empty($files) ? [$this->shortName()] : $files;

        return $this;
    }
}
