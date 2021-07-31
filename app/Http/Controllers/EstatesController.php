<?php

namespace App\Http\Controllers;

use App\Models\Estates;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Http\ResponseFactory;

class EstatesController extends Controller
{
    /**
     * @throws ValidationException
     */
    private function validation($request): array
    {
        return $this->validate($request,
            [
                'id_estate_type' => 'numeric|integer|required',
                'id_customer' => 'numeric|integer|required',
                'title' => 'string|required|regex:/^[a-zA-Z \'-]+$/',
                'dpe_file' => 'string|nullable|regex:/^[a-zA-Z \'-]+$/',
                'buy_or_rent' => 'string|required|regex:/^^(achat)$|^(Achat)$|^(location)$|^(Location)$$/',
                'address' => 'string|required|regex:/^[a-zA-Z \'-]+$/',
                'city' => 'string|required|regex:/^[a-zA-Z \'-]+$/',
                'zipcode' => 'string|required|regex:/^([0-9]{1}[0-5]{1}[0-9]{3})|(9[7-8]{1}[2-8]{1}[0-9]{2})$/',
                'estate_longitude' => 'numeric|required|regex:/^[0-9]+[\.,]{1}$/',
                'estate_latitude' => 'numeric|required|regex:/^[0-9]+[\.,]{1}$/',
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
            ]);
    }

    /**
     * Retourne la liste des biens immobilier
     *
     * @return Estates[]|Collection
     */
    public function selectAllEstates()
    {
        return Estates::all();
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function selectOneEstate($id): JsonResponse
    {
        $estate =  Estates::find($id);
        return response()->json($estate);
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
            'reference' => 'SMT'.substr(time(), 5, 9),
            'dpe_file' => $validated['dpe_file'],
            'buy_or_rent' => $validated['buy_or_rent'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'zipcode' => $validated['zipcode'],
            'estate_longitude' => $validated['estate_longitude'],
            'estate_latitude' => $validated['estate_latitude'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'year_of_construction' => $validated['year_of_construction'],
            'living_surface' => $validated['living_surface'],
            'carrez_law' => $validated['carrez_law'],
            'land_surface' => $validated['land_surface'],
            'nb_rooms' => $validated['nb_rooms'],
            'nb_bedrooms' => $validated['nb_bedrooms'],
            'nb_bathrooms' => $validated['nb_bathrooms'],
            'nb_sanitary' => $validated['nb_sanitary'],
            'nb_toilet' => $validated['nb_toilet'],
            'nb_kitchen' => $validated['nb_kitchen'],
            'nb_garage' => $validated['nb_garage'],
            'nb_parking' => $validated['nb_parking'],
            'nb_balcony' => $validated['nb_balcony'],
            'type_kitchen' => $validated['type_kitchen'],
            'heaters' => $validated['heaters'],
            'communal_heating' => $validated['communal_heating'],
            'furnished' => $validated['furnished'],
            'private_parking' => $validated['private_parking'],
            'handicap_access' => $validated['handicap_access'],
            'cellar' => $validated['cellar'],
            'terrace' => $validated['terrace'],
            'swimming_pool' => $validated['swimming_pool'],
            'fireplace' => $validated['fireplace'],
            'all_in_sewer' => $validated['all_in_sewer'],
            'septik_tank' => $validated['septik_tank'],
            'property_charge' => $validated['property_charge'],
            'attic' => $validated['attic'],
            'elevator' => $validated['elevator'],
            'rental_charge' => $validated['rental_charge'],
            'coownership_charge' => $validated['coownership_charge'],
        ]);

        return [$response];
    }


    public function update($id, Request $request): array
    {
        $estate = Estates::findOrFail($id);
        $estate->update($request->all());

        return [$estate];
    }
}
