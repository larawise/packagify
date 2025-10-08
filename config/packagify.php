<?php

return [
    /*
    |--------------------------------------------------------------------------
    | ℹ️ Packagify (Prefix)
    |--------------------------------------------------------------------------
    |
    | Managing all packages registered with Packagify with a central prefix
    | fis supported. The goal is to ensure sustainability and avoid conflicts
    | with different packages or projects in the future, as well as to provide
    | customizability. The prefix you set will be applicable to all packages.
    |
    */
    'prefix'                                    => env('PACKAGIFY_PREFIX', 'larawise/'),

    /*
    |--------------------------------------------------------------------------
    | ℹ️ Packagify (Prefixex)
    |--------------------------------------------------------------------------
    |
    | Managing all packages registered with Packagify with a central prefix
    | fis supported. The goal is to ensure sustainability and avoid conflicts
    | with different packages or projects in the future, as well as to provide
    | customizability. The prefix you set will be applicable to all packages.
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
    | Since Packagify is a comprehensive solution aimed at achieving sustainability
    | and maximizing package development processes without requiring extensive workload,
    | enable this setting if you need to globally access the instances of all packages
    | registered by Packagify across the application.
    |
    */
    'bindings'                                  => (bool) env('PACKAGIFY_BINDINGS', false),

    /*
    |--------------------------------------------------------------------------
    | ℹ️ Packagify (Paths)
    |--------------------------------------------------------------------------
    |
    | If you have changed the directories that are customizable by Laravel and are used
    | to publish certain components such as translations and view files discovered by
    | the packages, you can set these paths for Packagify in your application.
    | After setting them, these components will be moved to these directories when
    | the `vendor:publish` command is used.
    |
    */
    'paths'                                     => [
        'package'       => env('PACKAGIFY_PACKAGES_PATH', base_path('system')),
        'configurations'=> env('PACKAGIFY_PUBLISH_CONFIGURATIONS', config_path()),
        'translations'  => env('PACKAGIFY_PUBLISH_TRANSLATIONS', resource_path('languages')),
        'migrations'    => env('PACKAGIFY_PUBLISH_MIGRATIONS', database_path('migrations')),
        'views'         => env('PACKAGIFY_PUBLISH_VIEWS', resource_path('views')),
        'providers'     => env('PACKAGIFY_PUBLISH_PROVIDERS', app_path('Providers')),
    ],
];
