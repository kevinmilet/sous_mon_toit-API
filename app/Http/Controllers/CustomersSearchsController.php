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

}