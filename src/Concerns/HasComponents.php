<?php

namespace Larawise\Packagify\Concerns;

use Illuminate\Support\Facades\File;
use Illuminate\View\Component;

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
trait HasComponents
{
    /**
     * The package view components storage.
     *
     * @var array<string, string>
     */
    public $components = [];

    /**
     * Indicates if the components are class-based.
     *
     * @var bool
     */
    public $asClassBasedComponents = false;

    /**
     * Indicates if the components are anonymous.
     *
     * @var bool
     */
    public $asAnonymousComponents = false;

    /**
     * Enable component discovery for the `Packagify` package.
     *
     * @param string|array<string, string> $prefix The prefix or an array of component aliases and namespaces.
     * @param string|array<string, Component>|null $component The namespace or an array of components with their namespaces.
     *
     * @return $this Returns the current instance for method chaining.
     */
    public function hasComponents($prefix, $component = null)
    {
        // Set the view components discovery option to true for Packagify.
        $this->option(
            key: 'hasComponents',
            value: true
        );

        // If the prefix is a string and the component class exists, add to the components array
        if (is_string($prefix) && class_exists($component)) {
            $this->components = array_merge($this->components, [$prefix => $component]);
        }

        // If the prefix is an array and component is null, iterate through the prefix array
        if (is_array($prefix) && is_null($component)) {
            foreach ($prefix as $alias => $base) {
                // If the base is not an array, mark as class-based component
                if (! is_array($base)) {
                    $this->asClassBasedComponents = true;
                }

                $this->components = array_merge($this->components, [$alias => $base]);
            }
        }

        // If the prefix is a string and the component is a directory, mark as anonymous components
        if (is_string($prefix) && File::isDirectory($component)) {
            $this->asAnonymousComponents = true;

            $this->components = array_merge($this->components, [$prefix => $component]);
        }

        // Return the current instance for method chaining
        return $this;
    }
}
