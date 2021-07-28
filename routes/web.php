<?php

/** @var Router $router */

use Laravel\Lumen\Routing\Router;

//Auth
$router->group(['prefix' => 'auth'], function ($router) {
    $router->group(['prefix' => 'login'], function($router) {
        $router->post('customer', 'AuthController@loginCustomer');
        $router->post('staff', 'AuthController@loginStaff');
    });
    $router->group(['prefix'=>'register'], function($router){
        $router->post('customer', 'AuthController@registerCustomer');
        $router->post('staff', 'AuthController@registerStaff');
    });

    // $router->post('logout', 'AuthController@logout');
    // $router->post('refresh', 'AuthController@refresh');
    // $router->post('me', 'AuthController@me');
});


$router->group(['prefix' => 'biens'], function () use ($router) {
    $router->get('/', 'EstatesController@selectAllEstates'); // /biens/
    $router->get('/{id}', 'EstatesController@selectOneEstate'); // /biens/{id}
    $router->patch('/archive/{id}', 'EstatesController@archive'); // /biens/archive/{id}
});

//Appointment
$router->group(['prefix' => 'schedule'], function () use ($router){
    $router->get('/', 'AppointmentsController@showAllAppointments'); // /schedule/
    $router->get('{appointment_id}', 'AppointmentsController@showAppointment'); // /schedule/{appointment_id}
    $router->get('customer/{customer_id}', 'AppointmentsController@showCustomerAppointment'); // /scheduled/customer/{customer_id}
    $router->get('staff/{staff_id}', 'AppointmentsController@showStaffAppointment'); // /scheduled/customer/{staff_id}
    $router->post('createAppt', 'AppointmentsController@createAppointment'); // /schedule/createAppt
    $router->put('update/{appointment_id}', 'AppointmentsController@updateAppointment'); // /schedule/update/{appointment_id} (data à passer en params)
    $router->delete('delete/{appointment_id}', 'AppointmentsController@deleteAppointment'); // /schedule/delete/{appointment_id}
});

//AppointmentType
$router->get('apptTypes', 'AppointmentsTypesController@showAllTypes'); // /apptTypes

/*
 *  Routes pour Staffs
 */
$router->group(['prefix' => 'staff'], function () use ($router) {
    $router->get('/', 'StaffsController@getAllStaff'); // /staff/
    $router->get('/{id}', 'StaffsController@getOneById'); // /staff/{id}
    $router->patch('/archive/{id}', 'StaffsController@archive'); // /staff/archive/{id}
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
    $router->get('/','CustomersController@selectAllCustomers');
    $router->get('/{id}', 'CustomersController@selectOneCustomer');
    $router->patch('/archive/{id}','CustomersController@archive');
});

//Contract
$router->group(['prefix' => 'contract'], function () use ($router){
    $router->get('/', 'ContractsController@selectAllContracts');
    $router->get('/contractsTypes', 'ContractsTypesController@selectAllContractsTypes');
    $router->get('/{id_contract}', 'ContractsController@selectOneContract');
    $router->patch('/archive/{id_contract}', 'ContractsController@archiveContract');
});
