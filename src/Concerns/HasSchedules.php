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
trait HasSchedules
{
    /**
     * The package schedule command storage.
     *
     * @var string[]
     */
    public $schedules = [];

    /**
     * Enable schedule command discovery for the `Packagify` package.
     *
     * @param string|array $commands
     *
     * @return $this
     */
    public function hasSchedules($commands)
    {
        // Set the schedule command discovery option to true for Packagify.
        $this->option(
            key: 'hasSchedules',
            value: true
        );

        // Convert commands to array if not already
        $commands = is_array($commands) ? $commands : [$commands];

        // Assign commands
        $this->schedules = array_merge($this->schedules, $commands);

        return $this;
    }
}
