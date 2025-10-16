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
trait HasHelpers
{
    /**
     * The package helper storage.
     *
     * @var string[]
     */
    public $helpers = [];

    /**
     * Enable helper discovery for the `Packagify` package.
     *
     * @param string|array $files
     *
     * @return $this
     */
    public function hasHelpers($files = [])
    {
        // Set the helper discovery option to true for Packagify.
        $this->option(
            key: 'hasHelpers',
            value: true
        );

        // Convert files to array if not already
        $files = is_array($files) ? $files : [$files];

        if (empty($files)) {
            $files[] = $this->shortName();
        }

        $this->helpers = $files;

        return $this;
    }
}
