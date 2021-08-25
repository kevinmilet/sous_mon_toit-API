<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use OpenApi\Annotations as OA;


class Controller extends BaseController
{

    /** 
    * @OA\Info(title="Sous Mon Toit", version="0.1")
    *
    * @OA\Server(
    *      url="https://localhost:8000",
    *      description = "API de l'agence immobiliere Sous Mon Toit",
    *      @OA\Contact(
    *           email="laforet.gerard.smt@gmail.com",
    *           name="Gérard Laforêt - Directeur de l'agence SousMonToit"
    *      )    
    * )
    *
    * @OA\Parameter(
    *     name = "id",
    *     in = "path",
    *     description = "Id of resource",
    *     required = true,
    *     @OA\Schema(type="integer"),
    * )
    *
    * @OA\Response(
    *     response=400,
    *     description="Bad Request",
    * )
    * @OA\Response(
    *     response=401,
    *     description="Unauthenticated",
    * )
    * @OA\Response(
    *     response=403,
    *     description="Forbidden"
    * )
    * @OA\Response(
    *     response=404,
    *     description="Resource Not Found",
    *     @OA\JsonContent(
    *          @OA\Property(property="message", type="string", example="Resource Not Found")
    *     ),
    * )
    * @OA\Response( 
    *     response="default", 
    *     description="une erreur ""inattendue""",
    * )
    *
    * @OA\SecurityScheme(bearerFormat="JWT", type="apiKey" , securityScheme="bearer")
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
