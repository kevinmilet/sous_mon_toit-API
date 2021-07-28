<?php

namespace App\Http\Controllers;

use App\Models\AppointmentsTypes;



class AppointmentsTypesController extends Controller
{
    public function showAllTypes()
    {
        return AppointmentsTypes::all();
    }

}
