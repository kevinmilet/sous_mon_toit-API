<?php

namespace App\Http\Controllers;

use App\Models\DescribesCustomersTypes;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DescribesCustomersTypesController extends Controller{

    /**
     * Retourne la liste des types de customers
     *
     *  @OA\Get(
     *      path="/customer_type/",
     *      summary="Return the list of all Customers Types",
     *      operationId="getCustomersTypesList",
     *      tags={"CustomersTypes"},
     *      @OA\Response(
     *          response=200,
     *          description="A list with customers types",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/CustomersTypes"),
     *          ),
     *      ),
     *      @OA\Response(response="400", ref="#/components/responses/400"),
     *      @OA\Response(response="401", ref="#/components/responses/401"),
     *      @OA\Response(response="403", ref="#/components/responses/403"),
     *      @OA\Response(response="default", ref="#/components/responses/default"),
     * )
     *@return JsonResponse
     * @return DescribesCustomersTypes[]|Collection
     */
    public function getTypesForCustomer($id, Request $request): array {
        $typeCustomer = DB::table('describes_customers_types')
                            ->join('customers', 'customers.id', '=', 'describes_customers_types.id_customer')
                            ->join('customers_types','customers_types.id' ,'=', 'describes_customers_types.id_customer_type')
                            ->where('describes_customers_types.id_customer', '=', $id)
                            ->get();

        return [$typeCustomer];
    }


}
