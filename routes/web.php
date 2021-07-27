<?php

/** @var \Laravel\Lumen\Routing\Router $router */
$router->group(['prefix' => 'biens'], function () use ($router) {
    $router->get('/', 'EstatesController@selectAllEstates');
    $router->get('/{id}', 'EstatesController@selectOneEstate');
    $router->patch('/archive/{id}', 'EstatesController@archive');
});
