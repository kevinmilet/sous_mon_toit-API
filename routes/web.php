<?php

/** @var Router $router */

use Laravel\Lumen\Routing\Router;

$router->group(['prefix' => 'biens'], function () use ($router) {
    $router->get('/', 'EstatesController@selectAllEstates');
    $router->get('/{id}', 'EstatesController@selectOneEstate');
    $router->patch('/archive/{id}', 'EstatesController@archive');
});

//Appointment
$router->group(['prefix' => 'schedule'], function () use ($router){
    $router->get('/', 'appointmentCtrl@showAllAppointments'); // /schedule/
    $router->get('{appointment_id}', 'appointmentCtrl@showAppointment'); // /schedule/{appointment_id}
    $router->get('customer/{customer_id}', 'appointmentCtrl@showCustomerAppointment'); // /scheduled/customer/{customer_id}
    $router->get('staff/{staff_id}', 'appointmentCtrl@showStaffAppointment'); // /scheduled/customer/{staff_id}
    $router->post('createAppt', 'appointmentCtrl@createAppointment'); // /schedule/createAppt
    $router->patch('update', 'appointmentCtrl@updateAppointment'); // /schedule/update
    $router->delete('delete/{appointment_id}', 'appointmentCtrl@deleteAppointment'); // /schedule/delete/{appointment_id}
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

/*
 * Routes pour Roles
 */
$router->group(['prefix' => 'roles'], function () use ($router) {
    $router->get('/', 'RolesController@getAllRoles');
});
