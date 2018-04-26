<?php
/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
*/

$app = new \App\Application(
    realpath(__DIR__ . '/../')
);

$app->singleton(
    \Illuminate\Contracts\Debug\ExceptionHandler::class,
    \App\Exceptions\Handler::class
);

$app->withFacades();

//$app->withEloquent();

//$app->withPaginator();

$app->registerProviders();

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;
