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
trait HasHelpers
{
    /**
     * The package helper files.
     *
     * @var string[]
     */
    public $helpers = [];

    /**
     * Sets the hasHelpers option and assigns helper files.
     *
     * @param string|array $files
     *
     * @return $this
     */
    public function hasHelpers($files = [])
    {
        // Set the hasRoutes option to true
        $this->option(
            key: 'hasHelpers',
            value: true
        );

        // Convert files to array if not already
        $files = is_array($files) ? $files : [$files];

        if (empty($files)) {
            $files[] = $this->shortName();
            $files[] = 'constants';
        }

        $this->helpers = $files;

        return $this;
    }
}
