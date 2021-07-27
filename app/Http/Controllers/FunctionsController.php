<?php


namespace App\Http\Controllers;


use App\Models\Functions;
use Illuminate\Http\JsonResponse;

class FunctionsController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function getAllFunctions(): JsonResponse
    {
        return response()->json(Functions::all());
    }
}
