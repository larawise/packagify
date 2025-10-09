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
trait HasMigrations
{
    /**
     * The package migration storage.
     *
     * @var string|array|null
     */
    public $migrations = null;

    /**
     * Enable migration discovery for the `Packagify` package.
     *
     * @param string|array|null $tables
     *
     * @return $this
     */
    public function hasMigrations($tables = null)
    {
        // Set the migration discovery option to true for Packagify.
        $this->option(
            key: 'hasMigrations',
            value: true
        );

        if (is_string($tables) || is_array($tables)) {
            $this->migrations = is_array($tables) ? $tables : [$tables];
        }

        return $this;
    }
}
