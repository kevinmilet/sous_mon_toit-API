<?php

use Laravel\Lumen\Routing\Router;

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

//Contract
$router->group(['prefix' => 'contract'], function () use ($router){

    $router->get('/', 'ContractsController@selectAllContracts');
    $router->get('/contractsTypes', 'ContractsTypesController@selectAllContractsTypes');
    $router->get('/{id_contract}', 'ContractsController@selectOneContract');
    $router->patch('/archive/{id_contract}', 'ContractsController@archiveContract');

});

// $router->get('/contract', 'ContractsController@selectAllContracts');
// $router->get('/contractsTypes', 'ContractsTypesController@selectAllContractsTypes');
// $router->get('/contract/{id_contract}', 'ContractsController@selectOneContract');
// $router->patch('/archiveContract/{id_contract}', 'ContractsController@archive_contract');

$router->get('/', function () use ($router) {
    echo 'test';
});