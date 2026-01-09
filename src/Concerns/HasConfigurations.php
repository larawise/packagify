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
trait HasConfigurations
{
    /**
     * The package configuration storage.
     *
     * @var string[]
     */
    public $configurations = [];

    /**
     * Enable configuration discovery for the `Packagify` package.
     *
     * @param string|array|null $files
     *
     * @return $this
     */
    public function hasConfigurations($files = null)
    {
        // Set the configuration discovery option to true for Packagify.
        $this->option(
            key: 'hasConfigurations',
            value: true
        );

        $files = is_string($files) ? [$files] : $files;

        if (empty($files)) {
            $files[] = $this->shortName();
        }

        $this->configurations = $files;

        return $this;
    }
}
