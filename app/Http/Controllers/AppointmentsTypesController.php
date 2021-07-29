<?php

namespace App\Http\Controllers;

use App\Models\AppointmentsTypes;
use Illuminate\Database\Eloquent\Collection;


class AppointmentsTypesController extends Controller
{
    /**
     * @return AppointmentsTypes[]|Collection
     */
    public function showAllTypes()
    {
        return AppointmentsTypes::all();
    }

}
