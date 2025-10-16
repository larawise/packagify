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
trait HasAliases
{
    /**
     * The package alias storage.
     *
     * @var array<string, string>
     */
    public $aliases = [];

    /**
     * Enable alias discovery for the `Packagify` package.
     *
     * @param array<string, string>|string $alias
     * @param string|null $class
     *
     * @return $this
     */
    public function hasAliases($alias, $class = null)
    {
        // Set the alias discovery option to true for Packagify.
        $this->option(
            key: 'hasAliases',
            value: true
        );

        if (is_string($alias)) {
            $alias = [$alias => $class];
        }

        // Merge new aliases with the existing ones
        $this->aliases = array_merge($this->aliases, $alias);

        return $this;
    }
}
