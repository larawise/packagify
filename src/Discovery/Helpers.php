<?php

namespace Larawise\Packagify\Discovery;

use Illuminate\Support\Facades\File;

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
trait Helpers
{
    /**
     * Discover and manage package routes.
     *
     * @return void
     */
    protected function discoverHelpers()
    {
        // Skip helper discovering if the package doesn't declare helpers.
        if (! $this->package->options['hasHelpers']) {
            return;
        }

        // Load helpers from the target helper path.
        foreach ($this->package->helpers as $helper) {
            if (File::exists($target = $this->path("helpers/$helper.php"))) {
                File::requireOnce($target);
            }
        }
    }
}
