<?php

namespace App\Http\Controllers;

use App\Models\CustomersTypes;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomersTypesController extends Controller{

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
     *
     * @return CustomersTypes[]|Collection
     */
    public function selectAllCustomersTypes(){
        return CustomersTypes::all();
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function selectOneCustomerType($id): JsonResponse
    {
        $customerType=  CustomersTypes::find($id);
        return response()->json($customerType);
    }

    // public function update($id, Request $request){
    //     $customerSearch = CustomersTypes::findOrFail($id);
    //     $customerSearch->update($request->all());
    //     return response()->json(['success'=>'Modifications enregistrées']);


    // }
    // public function getTypesForCustomer($id, Request $request): array
    // {
    //     $typeCustomer = CustomersTypes::find($id)
    //         ->join('customers', 'customers.id', '=', 'customers_types.id')
    //         ->where('customers_types.id', '=', $id)
    //         ->get();

    // //    $staffFunction = Staffs::find($id)->function;

    //     return [$typeCustomer];
    // }
}
