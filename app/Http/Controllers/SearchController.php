<?php

namespace App\Http\Controllers;

use App\Models\Estates;
use App\Models\Pictures;
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
            'estate_type_name' => 'string|regex:/^[a-zA-Z]+$/',
            'nb_rooms' => 'string:regex:/^[1-5]{1,1}$/',
            'price' => 'number',
            'buy_or_rent' => 'string|required'
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function search(): JsonResponse
    {
        try {
            $query = Estates::query();

            if (request()->has('city') && !empty(request('city'))) {
                $city = ucfirst(request('city'));
                $query->where('city', 'like', $city);
            }
            if (request()->has('id_estate_type') && !empty(request('id_estate_type'))) {
                $query->where('id_estate_type', 'like', request('id_estate_type'));
            }
            if (request()->has('nb_rooms') && !empty(request('nb_rooms'))) {
                if (request('nb_rooms') === '5') {
                    $query->where('nb_rooms', '>=', intval(request('nb_rooms')));
                } else {
                    $query->where('nb_rooms', 'like', intval(request('nb_rooms')));
                }
            }
            if (request()->has('price') && !empty(request('price'))) {
                $query->where('price', '<=', request('price'));
            }
            if (request()->has('buy_or_rent')) {
                $query->where('buy_or_rent', 'like', request('buy_or_rent'));
            }

            $query->join('pictures', 'estates.id', '=', 'pictures.id_estate')
                ->where('pictures.cover', '=', 1);
            $result = $query->get();

            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
