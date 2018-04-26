<?php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
| Enjoy building your API!
|
| These routes gets automatically assigned "/api" as a prefix.
|
*/

$router->get('/', function () {
    return response('Welcome to /api.');
});
