<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use OpenApi\Annotations as OA;


class Controller extends BaseController
{

    /** 
    * @OA\Info(title="Ma première API", version="0.1") 
    * @OA\Server(
    *      url="http://localhost:8000",
    *      description = "API de l'agence immobiliere Sous Mon Toit",
    * )
    */
    protected function respondWithToken($token): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ], 200);
    }
}
