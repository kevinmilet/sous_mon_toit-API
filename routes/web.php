<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/biens', 'EstatesController@selectAllEstates');

$router->group(['prefix' => 'biens'], function () use ($router) {
    $router->get('/', 'EstatesController@selectAllEstates');
    $router->get('/{id}', 'EstatesController@selectOneEstate');
});
