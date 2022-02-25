<?php

namespace App\Http\Controllers;

use App\Models\Estates;
use DateTime;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Date;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Http\ResponseFactory;

class EstatesController extends Controller
{
    /**
     * @throws ValidationException
     */
    private function validation($request): array
    {
        return $this->validate(
            $request,
            [
                'id_estate_type' => 'numeric|integer|required',
                'id_customer' => 'numeric|integer|required',
                'title' => 'string|required|regex:/^[a-zA-Z \'-]+$/',
                'dpe_file' => 'string|nullable|regex:/^[a-zA-Z \'-]+$/',
                'buy_or_rent' => array(
                    'string',
                    'required',
                    'regex:/^^(achat)$|^(Achat)$|^(location)$|^(Location)$$/'
                ),
                'address' => 'string|required',
                'city' => 'string|required|regex:/^[a-zA-Z \'-]+/',
                'zipcode' => array(
                    'string',
                    'required',
                    'regex:/^([0-9]{1}[0-9]{1}[0-9]{3})|(9[7-8]{1}[2-8]{1}[0-9]{2})$/'
                ),
                'estate_longitude' => 'numeric|required|regex:/^[0-9]+[\.,]{1}/',
                'estate_latitude' => 'numeric|required|regex:/^[0-9]+[\.,]{1}/',
                'price' => 'numeric|nullable|regex:/^[0-9]+[\.,]{1}$/',
                'description' => 'string|nullable',
                'year_of_construction' => 'date|nullable',
                'living_surface' => 'integer|nullable|regex:/^[0-9]{1,3}',
                'carrez_law' => 'integer|nullable|regex:/^[0-9]{1,3}',
                'land_surface' => 'integer|nullable|regex:/^[0-9]{1,5}',
                'nb_rooms' => 'integer|nullable|regex:/^[0-9]{1,2}',
                'nb_bedrooms' => 'integer|nullable|regex:/^[0-9]{1,2}',
                'nb_bathrooms' => 'integer|nullable|regex:/^[0-9]{1,2}',
                'nb_sanitary' => 'integer|nullable|regex:/^[0-9]{1,2}',
                'nb_toilet' => 'integer|nullable|regex:/^[0-9]{1,2}',
                'nb_kitchen' => 'integer|nullable|regex:/^[0-9]{1,2}',
                'nb_garage' => 'integer|nullable|regex:/^[0-9]{1,2}',
                'nb_parking' => 'integer|nullable|regex:/^[0-9]{1,2}',
                'nb_balcony' => 'integer|nullable|regex:/^[0-9]{1,2}',
                'type_kitchen' => 'string|nullable|regex:/^[a-zA-Z]+$/',
                'heaters' => 'string|nullable|regex:/^[a-zA-Z]+$/',
                'communal_heating' => 'boolean|nullable',
                'furnished' => 'boolean|nullable',
                'private_parking' => 'boolean|nullable',
                'handicap_access' => 'boolean|nullable',
                'cellar' => 'boolean|nullable',
                'terrace' => 'boolean|nullable',
                'swimming_pool' => 'boolean|nullable',
                'fireplace' => 'boolean|nullable',
                'all_in_sewer' => 'boolean|nullable',
                'septik_tank' => 'boolean|nullable',
                'property_charge' => 'numeric|nullable',
                'attic' => 'boolean|nullable',
                'elevator' => 'boolean|nullable',
                'rental_charge' => 'numeric|nullable|regex:/^[0-9]+$/',
                'coownership_charge' => 'numeric|nullable|regex:/^[0-9]+$/',
            ]
        );
    }

    /**
     *  @OA\Get(
     *      path="/estates",
     *      summary="Return the list of all estates",
     *      operationId="getEstatesList",
     *      tags={"Estates"},
     *      @OA\Response(
     *          response=200,
     *          description="A list with estates",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/Estates"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="une erreur ""inattendue""",
     *      ),
     * )
     *
     * @return JsonResponse
     */
    public function selectAllEstates(): JsonResponse
    {
        $estates = Estates::all();
        return response()->json($estates);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function selectOneEstate($id): JsonResponse
    {
        try {
            $estate =  Estates::find($id);

            if ($estate == null) {
                throw new Exception('aucun resultat');
            }

            $estate = Estates::leftJoin('estates_types', 'estates.id_estate_type', '=', 'estates_types.id')
                ->leftJoin('customers', 'estates.id_customer', '=', 'customers.id')
                ->select(
                    'estates.id',
                    'estates.id_customer',
                    'estates.id_estate_type',
                    'estates.title',
                    'estates.reference',
                    'estates.dpe_file',
                    'estates.buy_or_rent',
                    'estates.address as estateAddress',
                    'estates.city',
                    'estates.zipcode',
                    'estates.estate_longitude',
                    'estates.estate_latitude',
                    'estates.price',
                    'estates.description',
                    'estates.disponibility',
                    'estates.year_of_construction',
                    'estates.living_surface',
                    'estates.carrez_law',
                    'estates.land_surface',
                    'estates.nb_rooms',
                    'estates.nb_bedrooms',
                    'estates.nb_bathrooms',
                    'estates.nb_sanitary',
                    'estates.nb_toilet',
                    'estates.nb_kitchen',
                    'estates.nb_garage',
                    'estates.nb_parking',
                    'estates.nb_balcony',
                    'estates.type_kitchen',
                    'estates.heaters',
                    'estates.communal_heating',
                    'estates.furnished',
                    'estates.private_parking',
                    'estates.handicap_access',
                    'estates.cellar',
                    'estates.terrace',
                    'estates.swimming_pool',
                    'estates.fireplace',
                    'estates.all_in_sewer',
                    'estates.septik_tank',
                    'estates.property_charge',
                    'estates.attic',
                    'estates.elevator',
                    'estates.rental_charge',
                    'estates.coownership_charge',
                    'customers.n_customer',
                    'customers.firstname',
                    'customers.lastname',
                    'customers.gender',
                    'customers.mail',
                    'customers.phone',
                    'customers.password',
                    'customers.birthdate',
                    'customers.address as custAddress',
                    'customers.first_met',
                    'customers.token',
                    'customers.password_request',
                    'estates_types.estate_type_name',
                )
                ->where('estates.id', '=', $id)
                ->get();
            return response()->json($estate[0]);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * @param $id
     * @return Response|ResponseFactory
     */
    public function delete($id)
    {
        Estates::findOrFail($id)->delete();

        return response('Bien supprimé avec succès', 200);
    }


    /**
     * @throws ValidationException
     */
    public function create(Request $request): array
    {
        $validated = $this->validation($request);

        $estate = new Estates();
        $response = $estate->create([
            'id_estate_type' => $validated['id_estate_type'],
            'id_customer' => $validated['id_customer'],
            'title' => $validated['title'],
            'reference' => 'SMT' . substr(time(), 5, 9),
            // 'dpe_file' => $validated['dpe_file'],
            'buy_or_rent' => $validated['buy_or_rent'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'zipcode' => $validated['zipcode'],
            'estate_longitude' => $validated['estate_longitude'],
            'estate_latitude' => $validated['estate_latitude'],
            // 'price' => $validated['price'],
            // 'description' => $validated['description'],
            // 'year_of_construction' => $validated['year_of_construction'],
            // 'living_surface' => $validated['living_surface'],
            // 'carrez_law' => $validated['carrez_law'],
            // 'land_surface' => $validated['land_surface'],
            // 'nb_rooms' => $validated['nb_rooms'],
            // 'nb_bedrooms' => $validated['nb_bedrooms'],
            // 'nb_bathrooms' => $validated['nb_bathrooms'],
            // 'nb_sanitary' => $validated['nb_sanitary'],
            // 'nb_toilet' => $validated['nb_toilet'],
            // 'nb_kitchen' => $validated['nb_kitchen'],
            // 'nb_garage' => $validated['nb_garage'],
            // 'nb_parking' => $validated['nb_parking'],
            // 'nb_balcony' => $validated['nb_balcony'],
            // 'type_kitchen' => $validated['type_kitchen'],
            // 'heaters' => $validated['heaters'],
            // 'communal_heating' => $validated['communal_heating'],
            // 'furnished' => $validated['furnished'],
            // 'private_parking' => $validated['private_parking'],
            // 'handicap_access' => $validated['handicap_access'],
            // 'cellar' => $validated['cellar'],
            // 'terrace' => $validated['terrace'],
            // 'swimming_pool' => $validated['swimming_pool'],
            // 'fireplace' => $validated['fireplace'],
            // 'all_in_sewer' => $validated['all_in_sewer'],
            // 'septik_tank' => $validated['septik_tank'],
            // 'property_charge' => $validated['property_charge'],
            // 'attic' => $validated['attic'],
            // 'elevator' => $validated['elevator'],
            // 'rental_charge' => $validated['rental_charge'],
            // 'coownership_charge' => $validated['coownership_charge'],
        ]);

        return [$response];
    }

    /**
     * @param $id
     * @param Request $request
     * @return array
     */
    public function update($id, $typeUpdate, Request $request): array
    {
        // var_dump($request['price']);
        $estate = Estates::findOrFail($id);
        if ($typeUpdate == "step3") {
            $estate->update([
                'price' => $request['price'],
                'description' => $request['description'],
                'disponibility' => $request['disponibility'],
                'year_of_construction' => new DateTime($request['year_of_construction'] . "-01-01"),
                'living_surface' => $request['living_surface'],
                'carrez_law' => $request['carrez_law'],
                'land_surface' => $request['land_surface'],
                'nb_rooms' => $request['nb_rooms'],
                'nb_bedrooms' => $request['nb_bedrooms'],
                'nb_bathrooms' => $request['nb_bathrooms'],
                'nb_sanitary' => $request['nb_sanitary'],
                'nb_toilet' => $request['nb_toilet'],
                'nb_kitchen' => $request['nb_kitchen'],
                'nb_garage' => $request['nb_garage'],
                'nb_parking' => $request['nb_parking'],
                'nb_balcony' => $request['nb_balcony'],
                'type_kitchen' => $request['type_kitchen'],
                'heaters' => $request['heaters'],
                'communal_heating' => $request['communal_heating'],
                'furnished' => $request['furnished'],
                'private_parking' => $request['private_parking'],
                'handicap_access' => $request['handicap_access'],
                'cellar' => $request['cellar'],
                'terrace' => $request['terrace'],
                'swimming_pool' => $request['swimming_pool'],
                'fireplace' => $request['fireplace'],
                'all_in_sewer' => $request['all_in_sewer'],
                'septik_tank' => $request['septik_tank'],
                'property_charge' => $request['property_charge'],
                'attic' => $request['attic'],
                'elevator' => $request['elevator'],
                'rental_charge' => $request['rental_charge'],
                'coownership_charge' => $request['coownership_charge'],
            ]);
        } else if ($typeUpdate == "equipment") {
            $estate->update([
                'communal_heating' => $request['communal_heating'],
                'furnished' => $request['furnished'],
                'private_parking' => $request['private_parking'],
                'handicap_access' => $request['handicap_access'],
                'cellar' => $request['cellar'],
                'terrace' => $request['terrace'],
                'swimming_pool' => $request['swimming_pool'],
                'fireplace' => $request['fireplace'],
                'all_in_sewer' => $request['all_in_sewer'],
                'septik_tank' => $request['septik_tank'],
                'attic' => $request['attic'],
                'elevator' => $request['elevator'],
            ]);
        } else if ($typeUpdate == "caract") {
            $estate->update([
                'nb_rooms' => $request['nb_rooms'],
                'nb_bedrooms' => $request['nb_bedrooms'],
                'nb_bathrooms' => $request['nb_bathrooms'],
                'nb_sanitary' => $request['nb_sanitary'],
                'nb_toilet' => $request['nb_toilet'],
                'nb_kitchen' => $request['nb_kitchen'],
                'nb_garage' => $request['nb_garage'],
                'nb_parking' => $request['nb_parking'],
                'nb_balcony' => $request['nb_balcony'],
                'type_kitchen' => $request['type_kitchen'],
                'heaters' => $request['heaters'],
            ]);
        } else if ($typeUpdate == "info") {
            $estate->update([
                'title' => trim($request['title']),
                'id_estate_type' => trim($request['id_estate_type']),
                'buy_or_rent' => trim($request['buy_or_rent']),
                'price' => trim($request['price']),
                'description' => trim($request['description']),
                'disponibility' => trim($request['disponibility']),
                'year_of_construction' => new DateTime(trim($request['year_of_construction']) . "-01-01"),
                'living_surface' => trim($request['living_surface']),
                'carrez_law' => trim($request['carrez_law']),
                'land_surface' => trim($request['land_surface']),
                'property_charge' => trim($request['property_charge']),
                'rental_charge' => trim($request['rental_charge']),
                'coownership_charge' => trim($request['coownership_charge']),
            ]);
        } else if ($typeUpdate == "loca") {
            $estate->update([
                'address' => $request['address'],
                'city' => $request['city'],
                'zipcode' => $request['zipcode'],
                'estate_longitude' => $request['estate_longitude'],
                'estate_latitude' => $request['estate_latitude'],
            ]);
        }
        return [$estate];
    }

    /**
     * @return JsonResponse
     */
    public function randomEstates(): JsonResponse
    {
        $estatesRnd = Estates::join('pictures', 'estates.id', '=', 'pictures.id_estate')->select('*')->random(3);
        return response()->json($estatesRnd);
    }

    /**
     * @param $value
     * @return mixed
     */
    public function searchEstates($value)
    {
        $value = '%' . $value . '%';
        return Estates::where('title', 'like', $value)
            ->orWhere('reference', 'like', $value)
            ->orWhere('address', 'like', $value)
            ->orWhere('city', 'like', $value)
            ->orWhere('zipcode', 'like', $value)
            ->get();
    }
}
