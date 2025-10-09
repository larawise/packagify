<?php

namespace Larawise\Packagify\Discovery;

use Illuminate\Support\Traits\Macroable;
use Larawise\Packagify\Exceptions\PackagifyException;

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
trait Macros
{
    /**
     * Discover and manage package macros.
     *
     * @return void
     * @throws PackagifyException
     */
    protected function discoverMacros()
    {
        // Check if the package has macros enabled.
        if (! $this->package->options['hasMacros']) {
            return;
        }

        // Iterate through each handler and its associated macros.
        foreach ($this->package->customMacros as $target => $macros) {
            // Check if the handler class uses the Macroable trait.
            $macroable = in_array(Macroable::class, class_uses($target));

            // If the handler is not macroable, throw an exception.
            if (! $macroable) {
                throw new PackagifyException("The class {$target} is not macroable. Ensure it implements the necessary traits or interfaces.");
            }

            // Register each macro for the handler.
            foreach ($macros as $macro) {
                // Construct the method name for registering the macro.
                $method = 'register' . ucfirst($macro) . 'Macro';

                // Check if the method exists in the current class.
                if (method_exists($this, $method)) {
                    // Call the method to register the macro.
                    $this->{$method}($target);
                } else {
                    // If the method does not exist, throw an exception.
                    throw new PackagifyException("The macro [{$macro}] does not exist.");
                }
            }
        }
    }
}
