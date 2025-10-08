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
trait HasConfigurations
{
    /**
     * The package configuration files.
     *
     * @var string[]
     */
    public $configurations = [];

    /**
     * Sets the hasConfigurations option and assigns the config files.
     *
     * @param string|array|null $files
     *
     * @return $this
     */
    public function hasConfigurations($files = null)
    {
        $this->option(
            key: 'hasConfigurations',
            value: true
        );

        $files = is_string($files) ? [$files] : $files;

        if (empty($files)) {
            $files[] = $this->shortName();
            $files[] = 'permissions';
            $files[] = 'email';
        }

        $this->configurations = $files;

        return $this;
    }
}
