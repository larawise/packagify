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
trait HasAliases
{
    /**
     * Stores package aliases.
     *
     * @var array<string, string>
     */
    public $aliases = [];

    /**
     * Adds aliases and enables the `hasAliases` option.
     *
     * @param array<string, string>|string $alias
     * @param string|null $class
     *
     * @return $this
     */
    public function hasAliases($alias, $class = null)
    {
        // Enable the `hasAliases` option
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
