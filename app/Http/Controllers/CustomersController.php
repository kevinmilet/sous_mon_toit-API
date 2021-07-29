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

    private function validation($request) {
        $validated = $this->validate($request, [
            'n_customer' => 'required|string',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'gender' => 'required|string',
            'mail' => 'string|email|unique:customers',
            'phone' => 'required|string',
            'birthdate' => 'date',
            'address' => 'string',
            'created_at' => 'date',
            'archived_at' => 'date',
            'update_at' => 'date',
            'first_met' => 'required|integer',
            'token' => 'string',
            'password_request' => 'integer',

        ]);
        return $validated;
    }
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): array
    {

       $validated = $this->validation($request);
        Customers::create([
            'n_customer' => $validated['n_customer'],
            'firstname' => $validated['firstname'],
            'lastname' => $validated['lastname'],
            'gender' => $validated['gender'],
            'mail' => $validated['mail'],
            'phone' => $validated['phone'],
            'password'=>$validated['password'],
            'birthdate' => $validated['birthdate'],
            'address' => $validated['address'],
            'created_at' => $validated['created_at'],
            'archived_at' => $validated['archived_at'],
            'updated_at' => $validated['updated_at'],
            'first_met' => $validated['first_met'],
            'token' => $validated['token'],
            'password_request' => $validated['password_request']

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
        $this->validation($request);
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
