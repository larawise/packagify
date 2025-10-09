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
trait Migrations
{
    /**
     * Discover and manage package migrations.
     *
     * @return void
     */
    public function discoverMigrations()
    {
        // Skip migration discovering if the package doesn't declare migrations.
        if (! $this->package->options['hasMigrations']) {
            return;
        }

        // Set the path for the migrations.
        $path = $this->path('database/migrations');
        $publish = config('packagify.paths.migrations');

        // Check and create necessary migration files.
        if (! is_null($tables = $this->package->migrations)) {
            foreach ($tables as $table) {
                $table = explode('_', $table);
                $name = "{$table[0]}_{$table[1]}_table";
                $stubs = $this->path('database/migrations');

                if (! $this->migrationExists($table[1], $table[0])) {
                    $this->creator()->create($name, $stubs, $table, $table[0] === 'create');
                }
            }
        }

        $this->loadMigrationsFrom($path);

        // If the application is running in the console, publish the migrations.
        if ($this->app->runningInConsole()) {
            $this->publishes([$path => $publish], "{$this->package->shortName()}-migrations");
        }
    }

    /**
     * Determine whether a migration for the table already exists.
     *
     * @param string $table
     *
     * @return bool
     */
    protected function migrationExists($table, $action)
    {
        $path = $this->app->joinPaths(
            $this->path('database/migrations'),
            "*_*_*_*_{$action}_{$table}_table.php"
        );

        return count($this->files()->glob($path)) !== 0;
    }


}
