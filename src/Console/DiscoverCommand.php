<?php

namespace Larawise\Packagify\Console;

use Illuminate\Console\Command;
use Illuminate\Foundation\PackageManifest;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Symfony\Component\Console\Attribute\AsCommand;

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
#[AsCommand(name: 'package:discover', description: 'Rebuild the cached packagify and other package manifest')]
class DiscoverCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'package:discover';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rebuild the cached packagify and other package manifest.';

    /**
     * Execute the console command.
     *
     * @param PackageManifest $manifest
     *
     * @return void
     */
    public function handle(PackageManifest $manifest)
    {
        $packages = $this->packages($manifest);

        $this->discoverPackages(
            $packages, config('packagify.prefixes'), 'Packagify'
        );

        $this->discoverPackages(
            $packages, config('packagify.prefixes'), 'Other', true
        );
    }

    /**
     * Discover packages and display them.
     *
     * @param Collection $packages
     * @param array $prefixes
     * @param string $type
     * @param bool $inverse
     *
     * @return void
     */
    protected function discoverPackages($packages, $prefixes, $type, $inverse = false)
    {
        $this->components->info("[Packagify] Discovering `{$type}` packages");

        $filter = $inverse
            ? fn ($package) => ! Str::startsWith($package, $prefixes)
            : fn ($package) => Str::startsWith($package, $prefixes);

        $packages
            ->filter($filter)
            ->each(fn ($description) => $this->components->task($description))
            ->whenNotEmpty(fn () => $this->newLine());
    }

    /**
     * Get the packages for the manifest collection.
     *
     * @param PackageManifest $manifest
     *
     * @return Collection
     */
    protected function packages(PackageManifest $manifest)
    {
        $manifest->build();

        return (new Collection($manifest->manifest))
            ->keys();
    }
}
