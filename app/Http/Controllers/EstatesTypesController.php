<?php

namespace App\Http\Controllers;

use App\Models\EstatesTypes;
use Illuminate\Http\JsonResponse;

class EstatesTypesController extends Controller
{
    /**
     * Retourne la liste des types des types de biens
     * 
     *  @OA\Get(
     *      path="/estates_types/",
     *      summary="Return the list of all estates Types",
     *      operationId="getEstatesTypesList",
     *      tags={"EstatesTypes"},
     *      @OA\Response( 
     *          response=200, 
     *          description="A list with estates types",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/EstatesTypes"),
     *          ),
     *      ),
     *      @OA\Response(response="400", ref="#/components/responses/400"),
     *      @OA\Response(response="401", ref="#/components/responses/401"),
     *      @OA\Response(response="403", ref="#/components/responses/403"),
     *      @OA\Response(response="default", ref="#/components/responses/default"),
     * )
     *
     * @return JsonResponse
     */
    public function getAllEstatesTypes(): JsonResponse
    {
        return response()->json(EstatesTypes::all());
    }
}
