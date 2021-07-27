<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//Appointment
$router->group(['prefix' => 'schedule'], function () use ($router){
    $router->get('/', showAllAppointment()); // /schedule/
    $router->get('{appointment_id}', showAppointment($appointment_id)); // /schedule/{appointment_id}
    $router->get('customer/{customer_id}', showCustomerAppointment($customer_id)); // /scheduled/customer/{customer_id}
    $router->get('staff/{staff_id}', showStaffAppointment($staff_id)); // /scheduled/customer/{staff_id}
    $router->post('createAppt', createAppointment()); // /schedule/createAppt
    $router->patch('update', updateAppointment()); // /schedule/update
    $route->delete('delete/{appointment_id}', deleteAppointment($appointment_id)); // /schedule/delete/{appointment_id}
})