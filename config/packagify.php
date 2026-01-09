<?php

return [
    /*
    |--------------------------------------------------------------------------
    | ℹ️ Packagify (Prefix)
    |--------------------------------------------------------------------------
    |
    | Packagify uses a central prefix to manage all registered packages. This
    | ensures sustainability, prevents conflicts across projects, and applies
    | the defined prefix consistently to all packages.
    |
    */
    'prefix' => env('PACKAGIFY_PREFIX', 'larawise/'),

    /*
    |--------------------------------------------------------------------------
    | ℹ️ Packagify (Prefixex)
    |--------------------------------------------------------------------------
    |
    | Packagify uses these prefixes to detect packages via the `discover` command.
    | This prevents naming conflicts across projects and ensures sustainable
    | management. The defined prefixes apply consistently to all discovered packages.
    |
    */
    'prefixes'                                  => [ ...array_filter(
        explode(',', env('PACKAGIFY_PREFIXES', 'larawise/'))
    )],

    /*
    |--------------------------------------------------------------------------
    | ℹ️ Packagify (Bindings)
    |--------------------------------------------------------------------------
    |
    | Packagify can bind all registered packages globally. Enable this to access
    | package instances across the application. Helps ensure sustainability and
    | easier package management.
    |
    */
    'bindings'                                  => (bool) env('PACKAGIFY_BINDINGS', false),

    /*
    |--------------------------------------------------------------------------
    | ℹ️ Packagify (Paths)
    |--------------------------------------------------------------------------
    |
    | Packagify allows customizing publishable paths for components like configs,
    | views, and translations. Set these paths to control where package resources
    | are published in your application. They will be used when running the
    | `vendor:publish` command.
    |
    */
    'paths'                                     => [
        'package'       => env('PACKAGIFY_PACKAGES_PATH', base_path('system')),
        'configurations'=> env('PACKAGIFY_PUBLISH_CONFIGURATIONS', config_path()),
        'translations'  => env('PACKAGIFY_PUBLISH_TRANSLATIONS', resource_path('languages/vendor')),
        'migrations'    => env('PACKAGIFY_PUBLISH_MIGRATIONS', database_path('migrations')),
        'views'         => env('PACKAGIFY_PUBLISH_VIEWS', resource_path('views/vendor')),
        'providers'     => env('PACKAGIFY_PUBLISH_PROVIDERS', app_path('Providers')),
    ],
];
