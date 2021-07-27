<?php

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

use Laravel\Lumen\Routing\Router;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

/*
 *  Routes pour Staffs
 */
$router->group(['prefix' => 'staff'], function () use ($router) {
    $router->get('/', 'StaffsController@getAllStaff');
    $router->get('/{id}', 'StaffsController@getOneById');
    $router->patch('/archive/{id}', 'StaffsController@archive');
});

/*
 * Routes pour Functions
 */
$router->group(['prefix' => 'functions'], function () use ($router) {
    $router->get('/', 'FunctionsController@getAllFunctions');
});
