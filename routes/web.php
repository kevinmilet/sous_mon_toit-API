<?php

/** @var Router $router */

use App\Http\Controllers\AppointmentsController;
use Laravel\Lumen\Routing\Router;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

//Auth
$router->group(['prefix' => 'login'], function ($router) {
    $router->post('customer', 'AuthController@loginCustomer'); // /login/customersss
    $router->post('staff', 'AuthController@loginStaff'); // /login/staff
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->group(['prefix' => 's'], function () use ($router) {
        $router->group(['middleware' => 'auth:staff'], function () use ($router) {
            $router->post('logout', 'AuthController@logout'); // /api/logout
            $router->post('me', 'AuthController@me'); // /api/me
            $router->post('refresh', 'AuthController@refresh'); // /api/refresh
        });
    });
    $router->group(['prefix' => 'c'], function () use ($router) {
        $router->group(['middleware' => 'auth:customer'], function () use ($router) {
            $router->post('logout', 'AuthController@logout'); // /api/logout
            $router->post('me', 'AuthController@me'); // /api/me
            $router->post('refresh', 'AuthController@refresh'); // /api/refresh
        });
    });
});

// Biens
$router->group(['prefix' => 'estates'], function () use ($router) {
    $router->get('/', 'EstatesController@selectAllEstates'); // /estates/
    $router->get('/rnd', 'EstatesController@randomEstates'); // /estates/rnd
    $router->post('/websearch', 'SearchController@search'); // /estates/search/
    $router->get('/search/{value}', 'EstatesController@searchEstates');
    $router->get('/{id}', 'EstatesController@selectOneEstate'); // /estates/{id}
    $router->group(['middleware' => 'auth:staff'], function () use ($router) {
        $router->post('/create', 'EstatesController@create'); // /estates/create/{id}
        $router->put('/update/{id}/{typeUpdate}', 'EstatesController@update'); // /estates/update/{id}
        $router->delete('/delete/{id}', 'EstatesController@delete'); // /estates/delete/{id}
    });
});

// Types de biens
$router->group(['prefix' => 'estates_types'], function () use ($router) {
    $router->get('/', 'EstatesTypesController@getAllEstatesTypes'); // /estates_types/
});

//Appointment
$router->group(['prefix' => 'schedule', 'middleware' => 'auth:staff'], function () use ($router) {
    $router->get('calendar', 'AppointmentsController@getCalendar');
    $router->get('today', 'AppointmentsController@showCurrentDayAptmts');
    $router->get('today_staff/{staff_id}', 'AppointmentsController@showCurrentDayStaffAptmts');
    $router->get('today_customer/{customer_id}', 'AppointmentsController@showCurrentDayCustomerAptmts');
    $router->get('customer/{customer_id}', 'AppointmentsController@showCustomerAppointment'); // /scheduled/customer/{customer_id}
    $router->get('staff/{staff_id}', 'AppointmentsController@showStaffAppointment'); // /scheduled/staff/{staff_id}
    $router->post('createAppt', 'AppointmentsController@createAppointment'); // /schedule/createAppt
    $router->put('update/{appointment_id}', 'AppointmentsController@updateAppointment'); // /schedule/update/{appointment_id} (data à passer en params)
    $router->delete('delete/{appointment_id}', 'AppointmentsController@deleteAppointment'); // /schedule/delete/{appointment_id}
    $router->get('appointmentsTypes', 'AppointmentsTypesController@showAllTypes'); // /schedule/appointmentsTypes
    $router->get('{appointment_id}', 'AppointmentsController@showAppointment'); // /schedule/{appointment_id}
    $router->get('/', 'AppointmentsController@showAllAppointments'); //schedule//
});

/*
 *  Routes pour Staffs
 */
$router->group(['prefix' => 'staff'], function () use ($router) {
    $router->get('/', 'StaffsController@getAllStaff'); // /staff/
    $router->get('/joinFunction/{id}', 'StaffsController@getFunctionForStaff'); // /staff/
    $router->get('/joinRole/{id}', 'StaffsController@getRoleForStaff');
    $router->get('/{id}', 'StaffsController@getOneById'); // /staff/{id}
    $router->group(['middleware' => 'auth:staff'], function () use ($router) {
        $router->post('create', 'StaffsController@create'); // /staff/create
        $router->post('/update/{id}', 'StaffsController@update'); // /staff/update/{id}
        $router->delete('/delete/{id}', 'StaffsController@delete'); // /staff/delete/{id}
    });
});

/*
 * Routes pour Functions
 */
$router->group(['prefix' => 'functions', 'middleware' => 'auth:staff'], function () use ($router) {
    $router->get('/', 'FunctionsController@getAllFunctions'); // /functions/
});

/*
 * Routes pour Roles
 */
$router->group(['prefix' => 'roles', 'middleware' => 'auth:staff'], function () use ($router) {
    $router->get('/', 'RolesController@getAllRoles'); // /roles/
});

// Customers
$router->group(['prefix' => 'customer'], function () use ($router) {
    $router->post('create', 'CustomersController@create');
    $router->group(['prefix' => 's'], function () use ($router) {
        $router->group(['middleware' => 'auth:staff'], function () use ($router) {
            $router->get('/', 'CustomersController@selectAllCustomers');
            $router->get('/{id}', 'CustomersController@selectOneCustomer');
            $router->put('update/{id}', 'CustomersController@update');
            $router->delete('delete/{id}', 'CustomersController@delete');
            $router->get('search/{value}', 'CustomersController@searchCustomers');
        });
    });
    $router->group(['prefix' => 'c'], function () use ($router) {
        $router->group(['middleware' => 'auth:customer'], function () use ($router) {
            $router->get('/{id}', 'CustomersController@selectOneCustomer');
            $router->put('update/{id}', 'CustomersController@update');
            $router->delete('delete/{id}', 'CustomersController@delete');
        });
    });
});

// Customers searchs
$router->group(['prefix' => 'customer_search'], function () use ($router) {

    $router->group(['prefix' => 's'], function () use ($router) {
        $router->group(['middleware' => 'auth:staff'], function () use ($router) {
            $router->get('/', 'CustomersSearchsController@selectAllCustomersSearchs');
            $router->get('/{id_search}', 'CustomersSearchsController@selectOneCustomerSearch');
            $router->get('/customer/{id_customer}', 'CustomersSearchsController@selectAllCustomersSearchsForCustomer');
            $router->post('/create/{id_customer}', 'CustomersSearchsController@create');
            $router->put('/update/{id}', 'CustomersSearchsController@update');
            $router->delete('/delete/{id}', 'CustomersSearchsController@delete');
            $router->get('/joinCustomer/{id}', 'CustomersSearchsController@getSearchsForCustomer');
        });
    });
    $router->group(['prefix' => 'c'], function () use ($router) {
        $router->group(['middleware' => 'auth:costumer'], function () use ($router) {
            $router->get('/joinCustomer/{id}', 'CustomersSearchsController@getSearchsForCustomer');
            $router->get('/{id_search}', 'CustomersSearchsController@selectOneCustomerSearch');
            $router->get('/customer/{id_customer}', 'CustomersSearchsController@selectAllCustomersSearchsForCustomer');
            $router->post('/create/{id_customer}', 'CustomersSearchsController@create');
            $router->put('/update/{id}', 'CustomersSearchsController@update');
            $router->delete('/delete/{id}', 'CustomersSearchsController@delete');
        });
    });
});

// Customers types
$router->group(['prefix' => 'customer_type'], function () use ($router) {
    $router->get('/', 'CustomersTypesController@selectAllCustomersTypes');
    $router->get('/{id}', 'CustomersTypesController@selectOneCustomerType');
    // $router->get('/joinCustomer/{id}', 'CustomersTypesController@getTypesForCustomer');
});

//Contract
$router->group(['prefix' => 'contract', 'middleware' => 'auth:staff'], function () use ($router) {
    $router->get('/', 'ContractsController@selectAllContracts');
    $router->get('/contractsTypes', 'ContractsTypesController@selectAllContractsTypes');
    $router->post('/saveContract', 'ContractsController@saveNewContract');
    $router->put('/update/{id_contract}', 'ContractsController@updateContract');
    $router->delete('/archive/{id_contract}', 'ContractsController@archiveContract');
    $router->get('/{id_contract}', 'ContractsController@selectOneContract');
});

// Pictures
$router->group(['prefix' => 'estates_pictures'], function () use ($router) {
    $router->get('/{id_estate}', 'PicturesController@getEstatePictures');
    $router->get('/cover/{id_estate}', 'PicturesController@getEstateCover');
    $router->group(['middleware' => 'auth:staff'], function () use ($router) {
        $router->delete('delete/{id_picture}', 'PicturesController@delete');
        $router->delete('delete_all/{id_estate}', 'PicturesController@deleteAll');
        $router->post('upload/{id_estate}', 'PicturesController@uploadPicture');
        $router->post('choiceCover/{id_estate}/{id_picture}', 'PicturesController@choiceCover');
    });
});

$router->group(['prefix' => 'describe_customer_type'], function () use ($router) {

    $router->get('/joinCustomer/{id}', 'DescribesCustomersTypesController@getTypesForCustomer');
});


$router->get('/key', function () {
    return \Illuminate\Support\Str::random(32);
});
