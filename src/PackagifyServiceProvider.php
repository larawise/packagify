<?php

namespace Larawise\Packagify;

use Illuminate\Foundation\Console\PackageDiscoverCommand;
use Larawise\Packagify\Commands\DiscoverCommand;

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
        $package->name('packagify')
            ->description('Packagify - Laravel packages made intuitive for every developer.')
            ->version('0.0.1')
            ->hasConfigurations();
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
