<?php

namespace App\Http\Controllers;

use App\Models\CustomersSearchs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomersSearchsController extends Controller{

    public function selectAllCustomersSearchs(){
        
        return CustomersSearchs::all();
    }

    public function selectOneCustomerSearch($id){
        
        $customerSearch =  CustomersSearchs::find($id);
        return response()->json($customerSearch);
    }

    public function update($id, Request $request){
        $customerSearch = CustomersSearchs::findOrFail($id);
        $customerSearch->update($request->all());
        return response()->json(['success'=>'Modifications enregistrées']);
            
    
    }

    public function delete($id){
        $customerSearch = CustomersSearchs::find($id);
        $customerSearch->delete();
        return response()->json(['success'=>'Suppression validée ']);
    }

    public function create(Request $request) {
        // a faire !! Champs à valider et a nettoyer
        CustomersSearchs::create([

            'buy_or_rent'=>$request->buy_or_rent,
            'surface_min'=>$request->surface_min,
            'number_rooms'=>$request->number_rooms,
            'budget_min'=>$request->budget_min,
            'budget_max'=>$request->budget_max,
            'search_longitude'=>$request->search_longitude,
            'search_latitude'=>$request->search_latitude,
            'search_radius'=>$request->search_radius,
            'created_at'=>$request->created_at,
            'updated_at'=>$request->update_at,
            'alert'=>$request->alert,
            'id_customer'=>$request->id_customer,
        
        ]);
        return response()->json(['success'=>'Recherche enregistrée']);
        
    }

}