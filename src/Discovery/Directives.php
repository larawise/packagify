<?php

namespace Larawise\Packagify\Discovery;

use Illuminate\View\Compilers\BladeCompiler;

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
trait Directives
{
    /**
     * Discover and manage package directives.
     *
     * @return void
     */
    protected function discoverDirectives()
    {
        // Skip directive registration if the package doesn't declare any Blade directives.
        // This avoids unnecessary compiler hooks for packages that don't use Blade.
        if (! $this->package->options['hasDirectives']) {
            return;
        }

        // Delay directive registration until the Blade compiler is fully resolved.
        // This ensures directives are registered only when Blade is ready,
        // preventing premature access or resolution errors in deferred service providers.
        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) {
            foreach ($this->package->directives as $alias => $callback) {
                // Register each directive with its alias and associated callback.
                // If the callback is a string (e.g. 'Class@method'), it will be resolved via the container.
                // The third parameter enables contextual binding for string-based callbacks.
                $blade->directive($alias, $callback, is_string($callback));
            }
        });
    }
}
