<?php

namespace Larawise\Packagify;

use Illuminate\Support\ServiceProvider;

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
abstract class PackagifyProvider extends ServiceProvider
{
    /**
     * Configure the packagify package.
     *
     * @param Packagify $package
     *
     * @return void
     */
    abstract public function configure(Packagify $package);

}
