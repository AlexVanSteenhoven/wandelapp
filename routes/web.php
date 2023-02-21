<?php

use App\Http\Controllers\RouteController;
use \Laravel\Lumen\Routing\Router;

/** @var Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// Return the guide to use the application
$router->get('/', function () {
    return view('home');
});

// Define all routes with a prefix of api
// Frontend will create a request to /api/RouteToBeUsed
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/cuid', 'RouteController@generateCuid');
    $router->get('/routes/{cuid}', 'RouteController@findAllByCuid');
    $router->post('/routes/upload/{cuid}', 'RouteController@store');
    $router->delete('/routes/delete/{id}/{cuid}', 'RouteController@destroy');
    $router->get('/health', 'HealthController@index');
});
