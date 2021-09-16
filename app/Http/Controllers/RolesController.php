<?php


namespace App\Http\Controllers;


use App\Models\Roles;
use Illuminate\Http\JsonResponse;

class RolesController extends Controller
{
    /**
     * Retourne la liste des rôles
     * 
     *  @OA\Get(
     *      path="/roles/",
     *      summary="Return the list of all rôles",
     *      operationId="getRolesList",
     *      tags={"Rôles"},
     *      @OA\Response( 
     *          response=200, 
     *          description="A list with rôles",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/Roles"),
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
    public function getAllRoles(): JsonResponse
    {
        return response()->json(Roles::all());
    }
}
