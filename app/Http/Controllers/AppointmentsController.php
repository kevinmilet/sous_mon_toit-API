<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private function validation($request) {
        $validated = $this->validate($request, [
            'notes' => 'nullable|string',
            'scheduled_at' => 'date',
            'id_estate' => 'numeric|integer',
            'id_staff' =>'numeric|integer',
            'id_customer' => 'numeric|integer',
            'id_appointment_type' => 'numeric|integer'

        ]);
        return $validated;
    }
    
    public function showAllAppointments()
    {
        return Appointments::all();
    }

    public function showAppointment($appointment_id) {
        return Appointments::findOrFail($appointment_id);
    }

    public function showCustomerAppointment($customer_id) {
        return Appointments::where('id_customer', $customer_id)->get();
    }

    public function showStaffAppointment($staff_id) {
        return Appointments::where('id_staff', $staff_id)->get();
    }

    public function createAppointment(Request $request){
        $validated = $this->validation($request);
        Appointments::create([
            'notes' => $validated['notes'],
            'scheduled_at' => $validated['scheduled_at'],
            'id_estate' => $validated['id_estate'],
            'id_staff' => $validated['id_staff'],
            'id_customer' => $validated['id_customer'],
            'id_appointment_type' => $validated['id_appointment_type']
        ]);

        return $validated;
    }

    public function updateAppointment($appointment_id, Request $request) {
        $appointments = Appointments::findOrFail($appointment_id);
        $validated = $this->validation($request);

        //validation à ajouter
        $appointments->update($request->all());
        return $appointments;
    }

    public function deleteAppointment($appointment_id) {
        $deleted_appt = Appointments::find($appointment_id)->delete();
        return $deleted_appt
    }
    //
}
