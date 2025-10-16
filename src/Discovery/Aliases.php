<?php

namespace Larawise\Packagify\Discovery;

use Illuminate\Foundation\AliasLoader;

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
trait Aliases
{
    /**
     * Discovers and registers package aliases.
     *
     * @return void
     */
    protected function discoverAliases()
    {
        // Skip alias discovering if the package doesn't declare aliases.
        if (! $this->package->options['hasAliases']) {
            return;
        }

        // Register aliases in the application.
        foreach ($this->package->aliases as $alias => $class) {
            AliasLoader::getInstance()->alias($alias, $class);
        }
    }
}
