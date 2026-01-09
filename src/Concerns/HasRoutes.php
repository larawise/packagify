<?php

namespace Larawise\Packagify\Concerns;

/**
 * Srylius - We build experiences — digital, physical, and everything in between.
 *
 * @package     Larawise
 * @subpackage  Packagify
 * @version     v1.0.0
 * @author      Selçuk Çukur <selcukcukur@outlook.com.tr>
 * @copyright   Srylius Teknoloji Limited Şirketi
 *
 * @see https://docs.larawise.com/ Larawise : Docs
 */
trait HasRoutes
{
    /**
     * The package route storage.
     *
     * @var string[]
     */
    public $routes = [];

    /**
     * Enable route discovery for the `Packagify` package.
     *
     * @param string|array $files
     *
     * @return $this
     */
    public function hasRoutes($files = [])
    {
        // Set the route discovery option to true for Packagify.
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
