<?php

namespace App\Http\Controllers;

use App\Models\Estates;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SearchController extends Controller
{
    /**
     * @param $request
     * @throws ValidationException
     */
    private function validation($request): void
    {
        $this->validate($request, [
            'city' => 'string|regex:/^[a-zA-Z\-\'.\s]+$/',
            'estate_type_name' =>'string|regex:/^[a-zA-Z]+$/',
            'nb_rooms' => 'string:regex:/^[1-5]{1,1}$/',
            'price' => 'number',
            'buy_or_rent' => 'string|required'
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {
        try {
            $queryByCity = '';
            $queryByRooms = '';
            $queryByType = '';
            $queryByPrice = null;
            $queryByBuyOrRent = '';

            // Recherche par ville
            if (isset($request->city) && !empty($request->city)) {
                $city = ucfirst($request->city);
                try {
                    $queryByCity = Estates::where('city', $city)->get();
                } catch (\Exception $e) {
                    dd($e->getMessage());
                }
            } else {
                $queryByCity = Estates::where('city', '!=', '')->get();
            }

            // Recherche par type de bien
            if (isset($request->id_estate_type) && !empty($request->id_estate_type)) {
                $queryByType = Estates::where('id_estate_type', $request->id_estate_type)->get();
            } else {
                $queryByType = Estates::where('id_estate_type', '!=', '')->get();
            }

            // Recherche par nombre de pieces
            if (isset($request->nb_rooms) && !empty($request->nb_rooms)) {
                if ($request->nb_rooms === '5') {
                    $queryByRooms = Estates::where('nb_rooms', '>=', intval($request->nb_rooms))->get();
                } else {
                    $queryByRooms = Estates::where('nb_rooms', intval($request->nb_rooms))->get();
                }
            } else {
                $queryByRooms = Estates::where('nb_rooms', '!=', '')->get();
            }

            // Recherche par budget
            if (isset($request->price) && !empty($request->price)) {
                $queryByPrice = Estates::where('price', '<=', $request->price)->get();
            } else {
                $queryByPrice = Estates::where('price', '!=', '')->get();
            }

            // Recherche par achat ou location
            if (isset($request->buy_or_rent) && !empty($request->buy_or_rent)) {
                $queryByBuyOrRent = Estates::where('buy_or_rent', $request->buy_or_rent)->get();
            }

            $result = Estates::all();

            $result = $result->intersect($queryByCity)
                ->intersect($queryByType)
                ->intersect($queryByRooms)
                ->intersect($queryByPrice)
                ->intersect($queryByBuyOrRent)
                ->all();

            return response()->json($result);

        } catch (\Exception $e) {
            return response()->json(['message'=>$e->getMessage()]);
        }
    }
}
