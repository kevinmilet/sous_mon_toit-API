<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller{

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

    private function validation($request) {
        return $this->validate($request, [
            'n_customer' => 'required|string',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'gender' => 'required|string',
            'mail' => 'string|email|unique:customers',
            'mail' => 'string|email',
            'phone' => 'required|string',
            'password'=> 'string',
            'birthdate' => 'date',
            'address' => 'string',
            'created_at' => 'date',
            'archived_at' => 'date',
            'update_at' => 'date',
            'created_at' => 'date',
            'archived_at' => 'date',
            'updated_at' => 'date',
            'first_met' => 'required|integer',
            'token' => 'string',
            'password_request' => 'integer',
        ]);

    }
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $validated = $this->validation($request);
    
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
        $validated = $this->validation($request);
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
