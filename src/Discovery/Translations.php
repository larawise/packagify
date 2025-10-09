<?php

namespace Larawise\Packagify\Discovery;

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
trait Translations
{
    /**
     * Discover and manage package translations.
     *
     * @return void
     */
    protected function discoverTranslations()
    {
        // Skip translation discovering if the package doesn't declare translations.
        if (! $this->package->options['hasTranslations']) {
            return;
        }

        // Set the namespace for the translations.
        $namespace = $this->package->translationNamespace;

        // Determine the paths for the translations within the package and publication path.
        $path = $this->app->joinPaths($this->package->path, 'resources/languages');

        // Load translations from the specified path and namespace.
        $this->loadTranslationsFrom($path, $namespace);

        // If the application is running in the console, publish the translations.
        if ($this->app->runningInConsole()) {
            // Determine the publish path for the translations.
            $publish = $namespace
                ? $this->app->joinPaths(config('packagify.paths.translations'), "{$this->package->namespace()}")
                : config('packagify.paths.translations');

            // Register paths to be published by the publish command.
            $this->publishes([$path => $publish], "{$this->package->shortName()}-translations");
        }
    }
}
