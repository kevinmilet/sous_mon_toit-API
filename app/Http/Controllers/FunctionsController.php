<?php


namespace App\Http\Controllers;


use App\Models\Functions;
use Illuminate\Http\JsonResponse;

class FunctionsController extends Controller
{
    /**
     * Retourne la liste des fonctions
     * 
     *  @OA\Get(
     *      path="/functions/",
     *      summary="Return the list of all functions",
     *      operationId="getFunctionsList",
     *      tags={"Functions"},
     *      @OA\Response( 
     *          response=200, 
     *          description="A list with functions",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/Functions"),
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
    public function getAllFunctions(): JsonResponse
    {
        return response()->json(Functions::all());
    }
}
