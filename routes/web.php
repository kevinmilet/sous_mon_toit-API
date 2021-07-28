<?php

/** @var Router $router */

use Laravel\Lumen\Routing\Router;

// Biens
$router->group(['prefix' => 'estates'], function () use ($router) {
    $router->get('/', 'EstatesController@selectAllEstates'); // /biens/
    $router->get('/{id}', 'EstatesController@selectOneEstate'); // /biens/{id}
    $router->patch('/archive/{id}', 'EstatesController@archive'); // /biens/archive/{id}
});
$router->get('/', function () use ($router) {
    echo 'test';
});
/** @var Router $router */

// Types de biens
$router->group(['prefix' => 'estates_types'], function () use ($router) {
    $router->get('/', 'EstatesTypesController@getAllEstatesTypes'); // /estates_types/
});

//Appointment
$router->group(['prefix' => 'schedule'], function () use ($router) {
    $router->get('/', 'appointmentsController@showAllAppointments'); // /schedule/
    $router->get('{appointment_id}', 'appointmentsController@showAppointment'); // /schedule/{appointment_id}
    $router->get('customer/{customer_id}', 'appointmentsController@showCustomerAppointment'); // /scheduled/customer/{customer_id}
    $router->get('staff/{staff_id}', 'appointmentsController@showStaffAppointment'); // /scheduled/customer/{staff_id}
    $router->post('createAppt', 'appointmentsController@createAppointment'); // /schedule/createAppt
    $router->put('update/{appointment_id}', 'appointmentsController@updateAppointment'); // /schedule/update/{appointment_id} (data à passer en params)
    $router->delete('delete/{appointment_id}', 'appointmentsController@deleteAppointment'); // /schedule/delete/{appointment_id}
});

/*
 *  Routes pour Staffs
 */
$router->group(['prefix' => 'staff'], function () use ($router) {
    $router->get('/', 'StaffsController@getAllStaff'); // /staff/
    $router->get('/{id}', 'StaffsController@getOneById'); // /staff/{id}
    $router->delete('/delete/{id}', 'StaffsController@delete'); // /staff/delete/{id}
    $router->post('/create/', 'StaffsController@create'); // /staff/create
    $router->put('/update/{id}', 'StaffsController@update'); // /staff/update/{id}
});

/*
 * Routes pour Functions
 */
$router->group(['prefix' => 'functions'], function () use ($router) {
    $router->get('/', 'FunctionsController@getAllFunctions'); // /functions/
});

/*
 * Routes pour Roles
 */
$router->group(['prefix' => 'roles'], function () use ($router) {
    $router->get('/', 'RolesController@getAllRoles'); // /roles/
});

// Customers
$router->group(['prefix' => 'customer'], function () use ($router) {
    $router->get('/', 'CustomersController@selectAllCustomers');
    $router->get('/{id}', 'CustomersController@selectOneCustomer');
    $router->post('create','CustomersController@create');
    $router->put('update/{id}','CustomersController@update');
    $router->delete('delete/{id}', 'CustomersController@delete');
});

// Customers searchs
$router->group(['prefix' => 'customer_search'], function () use ($router) {
    $router->get('/', 'CustomersSearchsController@selectAllCustomersSearchs');
    $router->get('/{id}', 'CustomersSearchsController@selectOneCustomerSearch');
     $router->post('create','CustomersSearchsController@create');
     $router->put('update/{id}','CustomersSearchsController@update');
     $router->delete('delete/{id}', 'CustomersSearchsController@delete');
});
//Contract
$router->group(['prefix' => 'contract'], function () use ($router) {
    $router->get('/', 'ContractsController@selectAllContracts');
    $router->get('/contractsTypes', 'ContractsTypesController@selectAllContractsTypes');
    $router->get('/createForm', 'ContractsController@createContractView');
    $router->post('/saveContract', 'ContractsController@saveNewContract');
    $router->put('/updateContract', 'ContractsController@updateContract');
    $router->patch('/archive/{id_contract}', 'ContractsController@archiveContract');
    $router->get('/{id_contract}', 'ContractsController@selectOneContract');
});
