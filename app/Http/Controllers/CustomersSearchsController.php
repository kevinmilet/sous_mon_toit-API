<?php

namespace App\Http\Controllers;

use App\Models\CustomersSearchs;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;

class CustomersSearchsController extends Controller{

    /**
     * @return CustomersSearchs[]|Collection
     */
    public function selectAllCustomersSearchs(){

        return CustomersSearchs::all();
    }

    private function validation($request) {
        $validated = $this->validate($request, [
           'buy_or_rent'=> 'required|string',
           'surface_min'=> 'numeric|interger',
            'number_rooms'=> 'numeric|integer',
            'budget_min'=> 'numeric',
            'budget_max'=>'numeric',
            'search_longitude'=>'numeric',
            'search_latitude'=>'numeric',
            'search_radius'=>'numeric|integer',
            'created_at'=>'date',
            'updated_at'=>'date',
            'alert'=>'boolean|required',
            'id_customer'=>'integer|required'
        ]);
        return $validated;
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
        $validated = $this->validation($request);

        CustomersSearchs::create([
         
            'buy_or_rent'=>$validated['buy_or_rent'],
            'surface_min'=>$validated['surface_min'],
            'number_rooms'=>$validated['number_rooms'],
            'budget_min'=>$validated['budget_min'],
            'budget_max'=>$validated['budget_max'],
            'search_longitude'=>$validated['search_longitude'],
            'search_latitude'=>$validated['search_latitude'],
            'search_radius'=>$validated['search_radius'],
            'created_at'=>$validated['created_at'],
            'updated_at'=>$validated['update_at'],
            'alert'=>$validated['alert'],
            'id_customer'=>$validated['id_customer'],

        ]);
        return response()->json(['success'=>'Recherche enregistrée']);
    }
}
