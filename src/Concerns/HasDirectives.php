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
trait HasDirectives
{
    /**
     * The package directives' storage.
     *
     * @var array
     */
    public $directives = [];

    /**
     * Enable blade directive discovery for the `Packagify` package.
     *
     * @param array<string, callable>|string $directive
     * @param string|null $callback
     *
     * @return $this
     */
    public function hasDirectives($directive, $callback = null)
    {
        // Set the alias discovery option to true for Packagify.
        $this->option(
            key: 'hasDirectives',
            value: true
        );

        // Convert commands to array if not already
        $directives = is_array($directive) ? $directive : [$directive => $callback];

        // Assign commands
        $this->directives = array_merge($this->directives, $directives);

        return $this;
    }
}
