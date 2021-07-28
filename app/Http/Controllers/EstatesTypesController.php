<?php

namespace App\Http\Controllers;

use App\Models\EstatesTypes;
use Illuminate\Http\JsonResponse;

class EstatesTypesController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function getAllEstatesTypes(): JsonResponse
    {
        return response()->json(EstatesTypes::all());
    }
}
