<?php

namespace App\Http\Controllers;

use App\Models\CustomersTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomersTypesController extends Controller{

    public function selectAllCustomersTypes(){
        
        return CustomersTypes::all();
    }

    public function selectOneCustomerType($id){
        
        $customerType=  CustomersTypes::find($id);
        return response()->json($customerType);
    }

    // public function update($id, Request $request){
    //     $customerSearch = CustomersTypes::findOrFail($id);
    //     $customerSearch->update($request->all());
    //     return response()->json(['success'=>'Modifications enregistrées']);
            
    
    // }

    


}