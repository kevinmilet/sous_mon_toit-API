<?php

namespace App\Http\Controllers;

use App\Models\Estates;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EstatesController extends Controller
{
    /**
     * @throws ValidationException
     */
    private function validation($request): array
    {
        return $this->validate($request,
            [
                'id' => 'numeric|integer|required',
                'id_estate_type' => 'numeric|integer|required',
                'id_customer' => 'numeric|integer|required',
                'reference_estate' => 'string|nullable',
                'dpe_file' => 'string|nullable',
                'buy_or_rent' => 'string|required',
                'address' => 'string|required',
                'city' => 'string|required',
                'zipcode' => 'string|required',
                'estate_longitude' => 'float|required',
                'estate_latitude' => 'float|required',
                'price' => 'float|nullable',
                'description' => 'text|nullable',
                'year_of_construction' => 'date|nullable',
                'linving_surface' => 'integer|nullable',
                'carrez_law' => 'integer|nullable',
                'land_surface' => 'integer|nullable',
                'nd_rooms' => 'integer|nullable',
                'nd_bedrooms' => 'integer|nullable',
                'nb_bathrooms' => 'integer|nullable',
                'nb_sanitary' => 'integer|nullable',
                'nb_toilet' => 'integer|nullable',
                'nb_kitchen' => 'integer|nullable',
                'nb_garage' => 'integer|nullable',
                'nb_parking' => 'integer|nullable',
                'nb_balcony' => 'integer|nullable',
                'type_kitchen' => 'string|nullable',
                'heaters' => 'string|nullable',
                'communal_heating' => 'boolean|nullable',
                'furnished' => 'boolean|nullable',
                'private_parking' => 'boolean|nullable',
                'handicap_access' => 'boolean|nullable',
                'cellar' => 'boolean|nullable',
                'terrace' => 'boolean|nullable',
                'swimming_pool' => 'boolean|nullable',
                'fireplace' => 'boolean|nullable',
                'all_in_serwer' => 'boolean|nullable',
                'septik_tank' => 'boolean|nullable',
                'propeety_charge' => 'float|nullable',
                'attic' => 'boolean|nullable',
                'elevator' => 'boolean|nullable',
                'rental_charge' => 'float|nullable',
                'coownership_charge' => 'float|nullable',
                'created_at' => 'date|required',
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
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function delete($id)
    {
        Estates::findOrFail($id)->delete();

        return response('Bien supprimé avec succès', 200);
    }


    public function create(Request $request): array
    {
        $validated = $this->validation($request);

        $estate = new Estates();
        return $estate->create([
            'id_estate_type' => $validated['id_estate_type'],
            'id_customer' => $validated['id_customer'],
            'reference_estate' => $validated['reference_estate'],
            'dpe_file' => $validated['dpe_file'],
            'buy_or_rent' => $validated['buy_or_rent'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'zipcode' => $validated['zipcode'],
            'estate_longitude' => $validated['float|required'],
            'estate_latitude' => $validated['estate_latitude'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'year_of_construction' => $validated['year_of_construction'],
            'linving_surface' => $validated['linving_surface'],
            'carrez_law' => $validated['carrez_law'],
            'land_surface' => $validated['land_surface'],
            'nd_rooms' => $validated['nd_rooms'],
            'nd_bedrooms' => $validated['nd_bedrooms'],
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
            'all_in_serwer' => $validated['all_in_serwer'],
            'septik_tank' => $validated['septik_tank'],
            'propeety_charge' => $validated['propeety_charge'],
            'attic' => $validated['attic'],
            'elevator' => $validated['elevator'],
            'rental_charge' => $validated['rental_charge'],
            'coownership_charge' => $validated['coownership_charge'],
            'updated_at' => null,
            'deleted_at' => null,
            'created_at' => $validated['created_at'],
        ]);
    }


    public function update($id, Request $request): array
    {
        $estate = Estates::findOrFail($id);
        $estate->update($request->all());

        return $estate;
    }
}
