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
trait HasCommands
{
    /**
     * The package commands.
     *
     * @var string[]
     */
    public $commands = [];

    /**
     * Adds commands and sets the `hasCommands` option.
     *
     * @param string|array $commands Commands to be added
     *
     * @return $this
     */
    public function hasCommands($commands)
    {
        // Set the hasCommands option to true
        $this->option(
            key: 'hasCommands',
            value: true
        );

        // Convert commands to array if not already
        $commands = is_array($commands) ? $commands : [$commands];

        // Assign commands
        $this->commands = array_merge($this->commands, $commands);

        return $this;
    }
}
