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
trait HasAssets
{
    /**
     * The package asset storage.
     *
     * @var array<string, string>
     */
    public $assets = [];

    /**
     * Enable asset discovery for the `Packagify` package.
     *
     * @param string|array $assets
     *
     * @return $this
     */
    public function hasAssets($assets)
    {
        // Set the asset discovery option to true for Packagify.
        $this->option(
            key: 'hasAssets',
            value: true
        );

        $assets = is_string($assets) ? $assets : [$assets];

        // Merge new assets with the existing ones
        $this->assets = array_merge($this->assets, $assets);

        return $this;
    }
}
