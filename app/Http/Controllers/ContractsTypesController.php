<?php

namespace App\Http\Controllers;
use App\Models\Contracts;
use App\Models\ContractsTypes;
use Illuminate\Database\Eloquent\Collection;

class ContractsTypesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Retourne la liste des types de contrats
     * 
     *  @OA\Get(
     *      path="/contract/contractsTypes",
     *      summary="Return the list of all contractsTypes",
     *      operationId="getContractsTypesList",
     *      tags={"ContractsTypes"},
     *      @OA\Response( 
     *          response=200, 
     *          description="A list with contracts types",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/ContractsTypes"),
     *          ),
     *      ),
     *      @OA\Response(response="400", ref="#/components/responses/400"),
     *      @OA\Response(response="401", ref="#/components/responses/401"),
     *      @OA\Response(response="403", ref="#/components/responses/403"),
     *      @OA\Response(response="default", ref="#/components/responses/default"),
     * )
     *
     * @return Collection
     */
    public function selectAllContractsTypes(): Collection
    {
        return ContractsTypes::all();
    }

    //
}
