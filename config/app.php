<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Application debug mode
    |--------------------------------------------------------------------------
    */
    'debug' => true,
    /*
    |--------------------------------------------------------------------------
    | Application password hashing method
    |--------------------------------------------------------------------------
    */
    'hash' => [
        'method' => 'bcrypt', // md5 | sha1 | sha256 | bcrypt (recommended!)
        'cost'   => 10 // This is the work factor for the bcrypt hashing method if used
    ],
    /*
    |--------------------------------------------------------------------------
    | Application URLs
    |--------------------------------------------------------------------------
    */
    'url'           => 'http://localhost', //  Does NOT end with a '/'!
    'login_url'     => '{url}/login', // The {url} constant represents the value above
    'dashboard_url' => '{url}/dashboard',
    /*
    |--------------------------------------------------------------------------
    | Application title
    |--------------------------------------------------------------------------
    */
    'sitename' => 'PytoMVC App',
    /*
    |--------------------------------------------------------------------------
    | Application HTTP proxy settings
    |--------------------------------------------------------------------------
    */
    'proxy' => [
        'enabled'  => false,
        'proxy_ip' => [], // '127.0.0.1'
    ],
    /*
    |--------------------------------------------------------------------------
    | Session inactivity timeout in minutes
    |--------------------------------------------------------------------------
    |
    | This requires the check.activity filter on all routes you want
    | this enabled on.
    |
    */
    'session_expire' => 0, // Put 0 to disable this feature
    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */
    'timezone' => 'UTC',
    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */
    'locale' => 'sv', // en|sv
    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */
    'fallback_locale' => 'en',
    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */
    'aliases' => [
        /*
         * Framework aliases...
         */
        'Auth'          => PytoMVC\System\Auth\Auth::class,

        /*
         * Laravel aliases...
         */
        'App'           => Illuminate\Support\Facades\App::class,
        'DB'            => Illuminate\Support\Facades\DB::class,
        'Cache'         => Illuminate\Support\Facades\Cache::class,
        'Config'        => Illuminate\Support\Facades\Config::class,
        'Validator'     => Illuminate\Support\Facades\Validator::class,
        'Event'         => Illuminate\Support\Facades\Event::class,
        'Hash'          => Illuminate\Support\Facades\Hash::class,
        'Request'       => Illuminate\Support\Facades\Request::class,
        'Response'      => Illuminate\Support\Facades\Response::class,
        'Redirect'      => Illuminate\Support\Facades\Redirect::class,
        'Input'         => Illuminate\Support\Facades\Input::class,
        'URL'           => Illuminate\Support\Facades\URL::class,
        'File'          => Illuminate\Support\Facades\File::class,
        'Capsule'       => Illuminate\Database\Capsule\Manager::class,
        'Eloquent'      => Illuminate\Database\Eloquent\Model::class,

        /*
         * Package aliases...
         */
        'Carbon'   => Carbon\Carbon::class,

        /*
         * Application aliases...
         */
        'EloquentModel' => App\Models\EloquentModel::class,
    ],
    /*
    |--------------------------------------------------------------------------
    | Register various Service Providers
    |--------------------------------------------------------------------------
    */
    'providers' => [
        /*
         * Package Service Providers...
         */
        //Sofa\Eloquence\ServiceProvider::class, // why sofa? cuz its awesome :D https://github.com/jarektkaczyk/eloquence

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

        /*
         * Package Service Providers...
         */
    ],
    /*
    |--------------------------------------------------------------------------
    | Response html templates (NOT CODED YET)
    |--------------------------------------------------------------------------
    */
    'templates' => [
        'bad_response' => '',
    ]
];
