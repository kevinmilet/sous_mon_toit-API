<?php

namespace App\Http\Controllers;

use App\Models\Estates;

class SearchController extends Controller
{

    public function search($query): \Illuminate\Http\JsonResponse
    {
        $result = Estates::all()->where('buy_or_rent', 'like', $query);
        return response()->json($result);
    }

}
