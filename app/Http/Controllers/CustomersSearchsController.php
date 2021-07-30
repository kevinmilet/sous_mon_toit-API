<?php

namespace App\Http\Controllers;

use App\Models\CustomersSearchs;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomersSearchsController extends Controller{

    /**
     * @return CustomersSearchs[]|Collection
     */
    public function selectAllCustomersSearchs(){

        return CustomersSearchs::all();
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function selectOneCustomerSearch($id_search): JsonResponse
    {
        $customerSearch =  CustomersSearchs::find($id_search);
        return response()->json($customerSearch);
    }

    /**
     * @param $id
     * @param Request $request
     * @return JsonResponse
     */
    public function update($id, Request $request): JsonResponse
    {
        $customerSearch = CustomersSearchs::findOrFail($id);
        $customerSearch->update($request->all());
        return response()->json(['success'=>'Modifications enregistrées']);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function delete($id): JsonResponse
    {
        $customerSearch = CustomersSearchs::find($id);
        $customerSearch->delete();
        return response()->json(['success'=>'Suppression validée ']);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        // a faire !! Champs à valider et a nettoyer
        CustomersSearchs::create([

            'buy_or_rent'=>$request->buy_or_rent,
            'surface_min'=>$request->surface_min,
            'number_rooms'=>$request->number_rooms,
            'budget_min'=>$request->budget_min,
            'budget_max'=>$request->budget_max,
            'search_longitude'=>$request->longitude,
            'search_latitude'=>$request->latitude,
            'search_radius'=>$request->radius,
            'created_at'=>$request->created_at,
            'updated_at'=>$request->update_at,
            'alert'=>$request->alert,
            'id_customer'=>$request->id_customer,

        ]);
        return response()->json(['success'=>'Recherche enregistrée']);
    }
}
