<?php

namespace Larawise\Packagify;

use Illuminate\Foundation\Console\PackageDiscoverCommand;
use Larawise\Packagify\Console\DiscoverCommand;

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
class PackagifyServiceProvider extends PackagifyProvider
{
    /**
     * Configure the packagify package.
     *
     * @param Packagify $package
     *
     * @return void
     */
    public function configure(Packagify $package)
    {
        // Set the package name.
        $package->name('packagify');

        // Set the package description.
        $package->description('Packagify - Laravel packages made intuitive for every developer.');

        // Set the package version.
        $package->version('1.0.0');

        // Set the package provideable.
        $package->hasConfigurations();
    }

    /**
     * Perform actions after the package is registered.
     *
     * @return void
     */
    public function packageRegistered()
    {
        // "Extend" a package discover command in the container.
        $this->app->extend(
            PackageDiscoverCommand::class, fn () => new DiscoverCommand
        );
    }
}
