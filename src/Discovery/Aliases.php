<?php

namespace Larawise\Packagify\Discovery;

use Illuminate\Foundation\AliasLoader;

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
trait Aliases
{
    /**
     * Discovery and register package aliases.
     *
     * @return void
     */
    protected function discoverAliases()
    {
        // Check if aliasing is enabled for the package.
        if (! $this->package->options['hasAliases']) {
            return;
        }

        // Register aliases in the application.
        foreach ($this->package->aliases as $alias => $class) {
            AliasLoader::getInstance()->alias($alias, $class);
        }
    }
}
