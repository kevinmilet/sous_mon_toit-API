<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use OpenApi\Annotations as OA;


class Controller extends BaseController
{

    /**
    * @OA\Info(
    *      title="Sous Mon Toit",
    *      version="0.1",
    *      description="Documentation for the API SousMonToit",)
    *
    * @OA\Server(
    *      url="http://localhost:8000",
    *      description = "Server of the real estate agency Sous Mon Toit",
    *      @OA\Contact(
    *           email="laforet.gerard.smt@gmail.com",
    *           name="Gérard Laforêt - real estate agency director of SousMonToit"
    *      )
    * )
    * @OA\Server(
    *      url="https://sousmontoit.herokuapp.com/",
    *      description = "Server heroku of the real estate agency Sous Mon Toit",
    *      @OA\Contact(
    *           email="laforet.gerard.smt@gmail.com",
    *           name="Gérard Laforêt - real estate agency director of SousMonToit"
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
    *     description="Access token is missing or invalid",
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
    * @OA\SecurityScheme(
    *     bearerFormat="JWT",
    *     type="http" ,
    *     securityScheme="bearerAuth",
    *     scheme="bearer",
    *     description="Enter the token for customer or staff"
    * )
    */
    protected function respondWithToken($token, $user): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * (60 * 12),
            'user' => $user
        ], 200);
    }
}
