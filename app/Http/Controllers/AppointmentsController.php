<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return Appointments[]|Collection
     */
    public function showAllAppointments()
    {
        return Appointments::all();
    }

    public function showAppointment($appointment_id) {
        return Appointments::find($appointment_id);
    }

    public function showCustomerAppointment($customer_id) {
        return Appointments::where('id_customer', $customer_id)->get();
    }

    public function showStaffAppointment($staff_id) {
        return Appointments::where('id_staff', $staff_id)->get();
    }

    public function createAppointment(Request $request){
        Appointments::create([
            'notes' => $request->note,
            'scheduled_at' => $request->scheduled_at,
            'id_estate' => $request->id_estate,
            'id_staff' => $request->id_staff,
            'id_customer' => $request->id_customer,
            'id_appointment_type' => $request->id_appointment_type
        ]);
    }
    //
}
