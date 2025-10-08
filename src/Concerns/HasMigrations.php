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
     *
     * @var string|array|null
     */
    public $migrations = null;

    /**
     * Set the hasMigrations option and assign migration files.
     *
     * @param string|array|null $tables
     *
     * @return $this Returns the current instance for chaining.
     */
    public function hasMigrations($tables = null)
    {
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
