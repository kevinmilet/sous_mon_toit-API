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
            'id_estate' => 'numeric',
            'id_staff' =>'numeric',
            'id_customer' => 'numeric',
            'id_appointment_type' => 'numeric'

        ]);
        return $validated;
    }
    
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
        $validated = $this->validation($request);
        Appointments::create([
            'notes' => $request->notes,
            'scheduled_at' => $request->scheduled_at,
            'id_estate' => $request->id_estate,
            'id_staff' => $request->id_staff,
            'id_customer' => $request->id_customer,
            'id_appointment_type' => $request->id_appointment_type
            // 'notes' => $validated['notes'],
            // 'scheduled_at' => $validated['scheduled_at'],
            // 'id_estate' => $validated['id_estate'],
            // 'id_staff' => $validated['id_staff'],
            // 'id_customer' => $validated['id_customer'],
            // 'id_appointment_type' => $validated['id_appointment_type']
        ]);
    }

    public function updateAppointment($appointment_id, Request $request) {
        $appointments = Appointments::findOrFail($appointment_id);
        $validated = $this->validation($request);

        //validation à ajouter
        $appointments->update($request->all());
        return $appointments;
    }

    public function deleteAppointment($appointment_id) {
        Appointments::find($appointment_id)->delete();
    }
    //
}
