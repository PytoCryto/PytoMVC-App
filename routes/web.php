<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| Now create something great!
|
*/

// this gets executed on every request that matches the passed methods
//$router->before(['GET'], function ($request, $app) {
//    $request->hello = 'Hello';
//});

//$router->get('/flush-cache', function () {
//    app('view')->flushCache();
//
//    return response('View cache flushed!');
//});
//$router->get('/force-logout', function () {
//    Auth::logout();
//
//    return redirect('login');
//});

$router->get('/', function () {
    return view('welcome');
});

/**
 * Authentication routes
 **/
//$router->group(['before' => ['guest']], function ($router) {
//    $router->get('/login', 'AuthController@index');
//    $router->post('/login', 'AuthController@login', ['before' => ['csrf']]);
//});
