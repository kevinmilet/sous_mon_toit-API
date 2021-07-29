<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AppointmentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param $request
     * @return array
     * @throws ValidationException
     */

    private function validation($request): array
    {
        return $this->validate($request, [
            'notes' => 'nullable|string',
            'scheduled_at' => 'date',
            'id_estate' => 'numeric|integer',
            'id_staff' =>'numeric|integer',
            'id_customer' => 'numeric|integer',
            'id_appointment_type' => 'numeric|integer'

        ]);
    }

    /**
     * @return Appointments[]|Collection
     */
    public function showAllAppointments()
    {
        return Appointments::all();
    }

    /**
     * @param $appointment_id
     * @return mixed
     */
    public function showAppointment($appointment_id) {
        return Appointments::findOrFail($appointment_id);
    }

    /**
     * @param $customer_id
     * @return mixed
     */
    public function showCustomerAppointment($customer_id) {
        return Appointments::where('id_customer', $customer_id)->get();
    }

    /**
     * @param $staff_id
     * @return mixed
     */
    public function showStaffAppointment($staff_id) {
        return Appointments::where('id_staff', $staff_id)->get();
    }

    /**
     * @param Request $request
     * @return array
     * @throws ValidationException
     */
    public function createAppointment(Request $request): array
    {
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

    /**
     * @param $appointment_id
     * @param Request $request
     * @return mixed
     * @throws ValidationException
     */
    public function updateAppointment($appointment_id, Request $request) {
        $appointments = Appointments::findOrFail($appointment_id);
        $validated = $this->validation($request);

        //validation à ajouter
        $appointments->update($request->all());
        return $appointments;
    }

    /**
     * @param $appointment_id
     * @return mixed
     */
    public function deleteAppointment($appointment_id) {
        return Appointments::find($appointment_id)->delete();
    }

}
