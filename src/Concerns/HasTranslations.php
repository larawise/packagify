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
trait HasTranslations
{
    /**
     * The package translations namespace.
     *
     * @var string|null
     */
    public $translationNamespace = null;

    /**
     * Sets the hasTranslations option and assigns the translation namespace.
     *
     * @param string|null $namespace
     *
     * @return $this
     */
    public function hasTranslations($namespace = null)
    {
        // Set the hasTranslations option to true
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
