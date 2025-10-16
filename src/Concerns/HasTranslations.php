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
trait HasTranslations
{
    /**
     * The package translation namespace.
     *
     * @var string|null
     */
    public $translationNamespace = null;

    /**
     * Enable translation discovery for the `Packagify` package.
     *
     * @param string|null $namespace
     *
     * @return $this
     */
    public function hasTranslations($namespace = null)
    {
        // Set the translation discovery option to true for Packagify.
        $this->option(
            key: 'hasTranslations',
            value: true
        );

        // If namespace is not null, assign it to translationNamespace
        if (! is_null($namespace)) {
            $this->translationNamespace = $namespace;
        }

        return $this;
    }
}
