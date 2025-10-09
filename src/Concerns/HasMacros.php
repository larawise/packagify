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
trait HasMacros
{
    /**
     * The package macro storage.
     *
     * @var array<class-string, callable>
     */
    public $customMacros = [];

    /**
     * Enable macro discovery for the `Packagify` package.
     *
     * @param string|array $macroable
     * @param callable|array|null $macro
     *
     * @return $this
     */
    public function hasMacros($macroable, $macro = null)
    {
        // Set the macro discovery option to true for Packagify.
        $this->option(
            key: 'hasMacros',
            value: true
        );

        // Determine if handler is an array, if not, create an array with the handler and macro.
        $macros = is_array($macroable) ? $macroable : [$macroable => $macro];

        // Assign the macros to the package.
        $this->customMacros = $macros;

        // Return the current instance for method chaining.
        return $this;
    }
}
