<?php

namespace Larawise\Packagify;

use Illuminate\Support\Str;
use Illuminate\Support\Traits\Conditionable;
use Illuminate\Support\Traits\Macroable;

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
class Packagify
{
    // Concerns
    use Concerns\HasAliases,
        Concerns\HasCommands,
        Concerns\HasComponents,
        Concerns\HasComposers,
        Concerns\HasConfigurations,
        Concerns\HasMigrations,
        Concerns\HasProviders,
        Concerns\HasRoutes,
        Concerns\HasHelpers,
        Concerns\HasMacros,
        Concerns\HasTranslations,
        Concerns\HasViews,
        Conditionable,
        Macroable;

    /**
     * The package name.
     *
     * @var string
     */
    public $name;

    /**
     * The package description.
     *
     * @var string
     */
    public $description = '';

    /**
     * The package version.
     *
     * @var string
     */
    public $version = '0.0.1';

    /**
     * The package base path.
     *
     * @var string
     */
    public $path;

    /**
     * The package name prefix.
     *
     * @var string
     */
    public $prefix = 'larawise/';

    /**
     * The package publishable status.
     *
     * @var bool
     */
    public $publishable = false;

    /**
     * The package options.
     *
     * @var array<string, bool>
     */
    public $options = [];

    /**
     * Get the package full name.
     *
     * @return string
     */
    public function fullName()
    {
        return $this->prefix.$this->name;
    }

    /**
     * Set the package name.
     *
     * @param string $name The name to set for the package.
     *
     * @return $this
     */
    public function name($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set the package description.
     *
     * @param string $description The description to set for the package.
     *
     * @return $this
     */
    public function description($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set the package version.
     *
     * @param string $version
     *
     * @return $this
     */
    public function version($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get the package namespace for the given type.
     *
     * @param string|null $type
     *
     * @return string.
     */
    public function namespace($type = null)
    {
        return match ($type) {
            'dotted' => Str::replace('/', '.', $this->fullName()),
            'hyphen' => Str::replace('/', '-', $this->fullName()),
            default => $this->fullName()
        };
    }

    /**
     * Set the package base path.
     *
     * @param string $path
     *
     * @return $this
     */
    public function path($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Set the package name prefix.
     *
     * @param string $prefix
     *
     * @return $this
     */
    public function prefix($prefix)
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * Get the package short name.
     *
     * @return string
     */
    public function shortName()
    {
        return Str::after($this->name, $this->prefix);
    }

    /**
     * Set the package option value for the given option.
     *
     * @param string|array $key
     * @param mixed $value
     *
     * @return void
     */
    public function option($key, $value = null)
    {
        if (is_array($key)) {
            foreach ($key as $k => $v) {
                $this->options[$k] = $v;
            }
        }

        $this->options[$key] = $value;
    }
}