<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller{

    /**
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return Customers[]|Collection
     */
    public function selectAllCustomers(){

        return Customers::all();
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function selectOneCustomer($id): JsonResponse
    {

        $customer =  Customers::find($id);
        return response()->json($customer);
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        // a faire !! Champs à valider et a nettoyer
        // // Validate if the input for each field is correct
        // $this->validate($request, [
        //     'n_customer' => 'required|string',
        //     'firstname' => 'required|integer',
        //     'lastname' => 'required|string',
        //     'gender' => 'required|string',
        //     'mail' => 'string',
        //     'phone' => 'required|string',
        //     'birthdate' => 'date',
        //     'address' => 'string',
        //     'created_at' => 'required|date',
        //     'archived_at' => 'date',
        //     'update_at' => 'date',
        //     'first_met' => 'required|integer',
        //     'token' => 'string',
        //     'password_request' => 'integer',
        //    ]);

        // Create the player
        // $customer = $this->customers->create([

            Customers::create([
            'n_customer' => $request->n_customer,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'gender' => $request->gender,
            'mail' => $request->mail,
            'phone' => $request->phone,
            'password'=>$request->password,
            'birthdate' => $request->birthdate,
            'address' => $request->address,
            'created_at' => $request->created_at,
            'archived_at' => $request->archived_at,
            'updated_at' => $request->updated_at,
            'first_met' => $request->first_met,
            'token' => $request->token,
            'password_request' => $request->password_request

        ]);
        return response()->json(['success'=>'Utisateur créer']);

    }

    /**
     * @param $id
     * @param Request $request
     * @return JsonResponse
     */
    public function update($id, Request $request): JsonResponse
    {
        $customer = Customers::findOrFail($id);
        $customer->update($request->all());
        return response()->json(['success'=>'Modifications enregistrées']);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function delete($id): JsonResponse
    {
        $customer = Customers::find($id);
        $customer->delete();
        return response()->json(['success'=>'Utilisateur supprimé']);
    }
}
