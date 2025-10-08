<?php

namespace Larawise\Packagify\Discovery;

use Illuminate\Support\Facades\View;

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
trait Composers
{
    /**
     * Discover and manage view composers for the package.
     *
     * @return void
     */
    protected function discoverComposers()
    {
        // Check if the package has view composers enabled.
        if (! $this->package->options['hasComposers']) {
            return;
        }

        // Register view composers for the specified views.
        foreach ($this->package->viewComposers as $view => $composer) {
            View::composer($view, $composer);
        }
    }
}
