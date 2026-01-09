<?php

namespace Larawise\Packagify\Discovery;

use Illuminate\Support\Facades\View;

/**
 * Srylius - We build experiences — digital, physical, and everything in between.
 *
 * @package     Larawise
 * @subpackage  Packagify
 * @version     v1.0.0
 * @author      Selçuk Çukur <selcukcukur@outlook.com.tr>
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
        // Skip view composer discovering if the package doesn't declare view composers.
        if (! $this->package->options['hasComposers']) {
            return;
        }

        // Register view composers for the specified views.
        foreach ($this->package->viewComposers as $view => $composer) {
            View::composer($view, $composer);
        }
    }
}
