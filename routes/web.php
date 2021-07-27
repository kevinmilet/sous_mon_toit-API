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
    echo 'test';
});

//Appointment
$router->group(['prefix' => 'schedule'], function () use ($router){
    $router->get('/', 'AppointmentsController@showAllAppointments'); // /schedule/
    $router->get('{appointment_id}', 'AppointmentsController@showAppointment'); // /schedule/{appointment_id}
    $router->get('customer/{customer_id}', 'AppointmentsController@showCustomerAppointment'); // /scheduled/customer/{customer_id}
    $router->get('staff/{staff_id}', 'AppointmentsController@showStaffAppointment'); // /scheduled/customer/{staff_id}
    $router->post('createAppt', 'AppointmentsController@createAppointment'); // /schedule/createAppt
    $router->patch('update', 'AppointmentsController@updateAppointment'); // /schedule/update
    $router->delete('delete/{appointment_id}', 'AppointmentsController@deleteAppointment'); // /schedule/delete/{appointment_id}
});
