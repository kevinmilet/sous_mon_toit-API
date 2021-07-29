<?php

namespace App\Http\Controllers;

use App\Models\CustomersTypes;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomersTypesController extends Controller{

    /**
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
}
