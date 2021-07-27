<?php

namespace App\Http\Controllers;

use App\Models\Customers;

class CustomersController extends Controller{

    public function selectAllCustomers(){
        
        return Customers::all();
    }

    public function selectOneCustomer($id){
        
        $customer =  Customers::find($id);
        return response()->json($customer);
    }

    public function archive($id): JsonResponse
    {
        $customer = Customers::findOrFail($id);
        $customer->archived_at = date("Y-m-d H:i:s");
        $customer->save();

        return response()->json('Utilisateur archivé avec succès', 200);
    }
    
    // public function create(Request $request) {
        
    //     // Validate if the input for each field is correct 
    //     $this->validate($request, [
    //         'n_customer' => 'required|string',
    //         'firstname' => 'required|integer',
    //         'lastname' => 'required|string',
    //         'gender' => 'required|string',
    //         'mail' => 'string',
    //         'phone' => 'required|string',
    //         'birthdate' => 'date',
    //         'address' => 'string',
    //         'created_at' => 'required|date',
    //         'archived_at' => 'date',
    //         'update_at' => 'date',
    //         'first_met' => 'required|integer',
    //         'token' => 'string',
    //         'password_request' => 'integer',
    //        ]);

    //     // Create the player
    //     $customer = $this->customers->create([
    //         'n_customer' => 'required|string',
    //         'firstname' => 'required|integer',
    //         'lastname' => 'required|string',
    //         'gender' => 'required|string',
    //         'mail' => 'string',
    //         'phone' => 'required|string',
    //         'birthdate' => 'date',
    //         'address' => 'string',
    //         'created_at' => 'required|date',
    //         'archived_at' => 'date',
    //         'update_at' => 'date',
    //         'first_met' => 'required|integer',
    //         'token' => 'string',
    //         'password_request' => 'integer',
    //         'name' => $request->input('name'),
    //         'age' =>  $request->input('age'),
    //         'nationality' =>  $request->input('nationality'),
    //         'club' =>  $request->input('club'),
    //         'gender' =>  $request->input('gender'),
    //     ]);

    //     return $player;
    // }

}
