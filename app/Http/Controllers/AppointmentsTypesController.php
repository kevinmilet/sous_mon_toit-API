<?php

namespace App\Http\Controllers;

use App\Models\AppointmentsTypes;
use Illuminate\Database\Eloquent\Collection;

/**
 * Retourne la liste des types de contrats
 * 
 *  @OA\Get(
 *      path="/schedule/appointmentsTypes",
 *      security={    
 *          {"bearerAuth": {}}
 *      },
 *      summary="Return the list of all appointmentTypes",
 *      operationId="getAppointmentTypesList",
 *      tags={"AppointmentsTypes"},
 *      @OA\Response( 
 *          response=200, 
 *          description="A list with appointments types",
 *          @OA\JsonContent(
 *              type="array",
 *              @OA\Items(ref="#/components/schemas/AppointmentsTypes"),
 *          ),
 *      ),
 *      @OA\Response(response="400", ref="#/components/responses/400"),
 *      @OA\Response(response="401", ref="#/components/responses/401"),
 *      @OA\Response(response="403", ref="#/components/responses/403"),
 *      @OA\Response(response="default", ref="#/components/responses/default"),
 * )
 */
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
