<?php


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
    echo 'test';
});
/** @var Router $router */

    // return $router->app->version();
    /** @var \Laravel\Lumen\Routing\Router $router */
    $router->group(['prefix' => 'customer'], function () use ($router) {

        $router->get('/','CustomersController@selectAllCustomers');
        $router->get('/{id}', 'CustomersController@selectOneCustomer');
        $router->patch('/archive/{id}','CustomersController@archive');
        $router->post('create','CustomersController@create');
        $router->put('update/{id}','CustomersController@update');
        $router->delete('delete/{id}', 'CustomersController@delete');

    });
    $router->group(['prefix' => 'customer_search'], function () use ($router) {

        $router->get('/','CustomersSearchsController@selectAllCustomersSearchs');
        // $router->get('/{id}', 'CustomersController@selectOneCustomer');
        // $router->patch('/archive/{id}','CustomersController@archive');
        // $router->post('create','CustomersController@create');
        // $router->put('update/{id}','CustomersController@update');
        // $router->delete('delete/{id}', 'CustomersController@delete');

    });

