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
     *  
     *  @OA\Get(
     *      path="/schedule/",
     *      security={
     *        {"bearerAuth": {}}
     *      },
     *      summary="Get list of all appointment",
     *      description="Return list of all appointments",
     *      operationId="getAppointmentList",
     *      tags={"Appointments"},
     *      @OA\Response( 
     *          response=200, 
     *          description="A list with appointment",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/Appointments"),
     *          ),
     *      ),
     *      @OA\Response(response="400", ref="#/components/responses/400"),
     *      @OA\Response(response="401", ref="#/components/responses/401"),
     *      @OA\Response(response="403", ref="#/components/responses/403"),
     *      @OA\Response(response="default", ref="#/components/responses/default"),
     * )
     * @return Appointments[]|Collection
     */
    public function showAllAppointments()
    {
        return Appointments::all();
    }

    /**
     *   
     *  @OA\Get(
     *      path="/schedule/{id}",
     *      security={
     *        {"bearerAuth": {}}
     *      },
     *      summary="Get appointment information",
     *      description="Return one appointment",
     *      operationId="getAppointment",
     *      tags={"Appointments"},
     *      @OA\Parameter(ref="#/components/parameters/id"),
     *      @OA\Response( 
     *          response=200, 
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Appointments"),
     *      ),
     *      @OA\Response(response="400", ref="#/components/responses/400"),
     *      @OA\Response(response="401", ref="#/components/responses/401"),
     *      @OA\Response(response="403", ref="#/components/responses/403"),
     *      @OA\Response(response="404", ref="#/components/responses/404"),
     *      @OA\Response(response="default", ref="#/components/responses/default"),
     *  )
     * 
     * @return mixed
     */
    public function showAppointment($appointment_id) {
        return Appointments::findOrFail($appointment_id);
    }

    /**
     *  @OA\Get(
     *      path="/schedule/customer/{id}",
     *      security={
     *        {"bearerAuth": {}}
     *      },
     *      summary="Get all appointments information for customer selected",
     *      description="Return all appointments for customer selected",
     *      operationId="getAppointmentCustomer",
     *      tags={"Appointments"},
     *      @OA\Parameter(ref="#/components/parameters/id"),
     *      @OA\Response( 
     *          response=200, 
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/Appointments"),
     *          ),
     *      ),
     *      @OA\Response(response="400", ref="#/components/responses/400"),
     *      @OA\Response(response="401", ref="#/components/responses/401"),
     *      @OA\Response(response="403", ref="#/components/responses/403"),
     *      @OA\Response(response="404", ref="#/components/responses/404"),
     *      @OA\Response(response="default", ref="#/components/responses/default"),
     *  )
     * 
     * @param $customer_id
     * @return mixed
     */
    public function showCustomerAppointment($customer_id) {
        return Appointments::where('id_customer', $customer_id)->get();
    }

    /**
     *  @OA\Get(
     *      path="/schedule/staff/{id}",
     *      security={
     *        {"bearerAuth": {}}
     *      },
     *      summary="Get all appointments information for staff selected",
     *      description="Return all appointments for staff selected",
     *      operationId="getAppointmentStaff",
     *      tags={"Appointments"},
     *      @OA\Parameter(ref="#/components/parameters/id"),
     *      @OA\Response( 
     *          response=200, 
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/Appointments"),
     *          ),
     *      ),
     *      @OA\Response(response="400", ref="#/components/responses/400"),
     *      @OA\Response(response="401", ref="#/components/responses/401"),
     *      @OA\Response(response="403", ref="#/components/responses/403"),
     *      @OA\Response(response="404", ref="#/components/responses/404"),
     *      @OA\Response(response="default", ref="#/components/responses/default"),
     *  )
     * 
     * @param $staff_id
     * @return mixed
     */
    public function showStaffAppointment($staff_id) {
        return Appointments::where('id_staff', $staff_id)->get();
    }

    /** 
     * @OA\Post(
     *     path="/schedule/createAppt",
     *     security={
     *        {"bearerAuth": {}}
     *     },
     *     operationId="storeAppointment",
     *     tags={"Appointments"},
     *     summary="Store new appointment",
     *     description="Returns successful message",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Appointments"),
     *     ),
     *     @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Appointments")
     *     ),
     *     @OA\Response(response="400", ref="#/components/responses/400"),
     *     @OA\Response(response="401", ref="#/components/responses/401"),
     *     @OA\Response(response="403", ref="#/components/responses/403"),
     *     @OA\Response(response="default", ref="#/components/responses/default"),
     * )
     * 
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
     *  @OA\Put(
     *      path="/schedule/update/{id}",
     *      security={
     *        {"bearerAuth": {}}
     *      },
     *      operationId="updateAppointments",
     *      tags={"Appointments"},
     *      summary="Update existing appointment",
     *      description="Returns updated appointment data",
     *      @OA\Parameter(ref="#/components/parameters/id"),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Appointments")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Appointments")
     *       ),
     *      @OA\Response(response="400", ref="#/components/responses/400"),
     *      @OA\Response(response="401", ref="#/components/responses/401"),
     *      @OA\Response(response="403", ref="#/components/responses/403"),
     *      @OA\Response(response="404", ref="#/components/responses/404"),
     *      @OA\Response(response="default", ref="#/components/responses/default"),
     * )
     * 
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
     *  @OA\Delete(
     *      path="/schedule/delete/{id}",
     *      security={
     *        {"bearerAuth": {}}
     *      },
     *      operationId="deleteAppointment",
     *      tags={"Appointments"},
     *      summary="Delete existing appointment",
     *      description="Return succesfull message",
     *      @OA\Parameter(ref="#/components/parameters/id"),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(response="400", ref="#/components/responses/400"),
     *      @OA\Response(response="401", ref="#/components/responses/401"),
     *      @OA\Response(response="403", ref="#/components/responses/403"),
     *      @OA\Response(response="404", ref="#/components/responses/404"),
     *      @OA\Response(response="default", ref="#/components/responses/default"),
     * )
     * @param $appointment_id
     * @return mixed
     */
    public function deleteAppointment($appointment_id) {
        return Appointments::find($appointment_id)->delete();
    }

}
