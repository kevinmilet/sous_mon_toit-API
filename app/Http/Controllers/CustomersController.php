<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CustomersController extends Controller{

    /**
     *  @OA\Get(
     *      path="/customer/s/",
     *      security={
     *        {"bearerAuth": {}}
     *      },
     *      summary="Get list of all customers",
     *      description="Return list of all customers",
     *      operationId="getCustomersList",
     *      tags={"CustomersForStaff"},
     *      @OA\Response(
     *          response=200,
     *          description="A list with customers",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/Customers"),
     *          ),
     *      ),
     *      @OA\Response(response="400", ref="#/components/responses/400"),
     *      @OA\Response(response="401", ref="#/components/responses/401"),
     *      @OA\Response(response="403", ref="#/components/responses/403"),
     *      @OA\Response(response="default", ref="#/components/responses/default"),
     * )
     *
     *
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
     * @throws ValidationException
     */
    private function validation($request): void
    {
        $this->validate($request, [
//            'n_customer' => 'string|required|regex:/^[0-9]{5}$/',
            'firstname' => 'string|required|regex:/^[a-zA-Z \'-]+$/',
            'lastname' => 'string|required|regex:/^[a-zA-Z \'-]+$/',
            'gender' => 'required|string|regex:/^[HF]$/',
            'mail' => 'string|email|unique:customers',
            'phone' => 'string|min:10|max:15|required|regex:/^[0-9 -\/\.]+$/',
            'password' => 'string|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%&?,;:#()<>\'.\/\\_éèàùûêâôöëç ])([-+!*$@%&.,;:#()<>\'.\/\\_éèàùûêâôöëç \w]{8,})$/',
            'birthdate' => 'date',
            'address' => 'string|regex:/^[0-9A-Za-zéèàùûêâôöëç \'\-]+$/',
            'first_met' => 'required|boolean',
            'token' => 'string',
            'password_request' => 'boolean',
        ]);

    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function create(Request $request): JsonResponse
    {
        $this->validation($request);

        $response = Customers::create([
            'n_customer' => substr(time(), 5, 9),
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'gender' => $request->gender,
            'mail' => $request->mail,
            'phone' => $request->phone,
            'password'=>password_hash($request->password, PASSWORD_DEFAULT),
            'birthdate' => $request->birthdate,
            'address' => $request->address,
            'first_met' => $request->first_met,
            'token' => $request->token,
            'password_request' => $request->password_request

        ]);
        return response()->json(['success'=>'Utilisateur créé', $response]);

    }

    /**
     * @param $id
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
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

    /**
     * @param $value
     * @return mixed
     */
    public function searchCustomers($value) {
        $value = '%'.$value.'%';
        return Customers::where('lastname', 'like', $value)
            ->orWhere('firstname', 'like', $value)
            ->get();
    }
}
