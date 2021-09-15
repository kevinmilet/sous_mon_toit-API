<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Get a JWT via given credentials.
     * 
     *  @OA\Post(
     *      path="/login/customer",
     *      summary="Get token for Customer",
     *      description="Return the token of the customer",
     *      operationId="getTokenCustomer",
     *      tags={"Authentification"},
     *      @OA\RequestBody(
     *           required=true,
     *           @OA\MediaType(
     *                  mediaType="application/x-www-form-urlencoded",
     *                  @OA\Schema(
     *                      type="object",
     *                      required={"mail","password"},
     *                      @OA\Property(
     *                          property="mail",
     *                          type="string",
     *                          description="mail of the customer member", 
     *                      ),
     *                      @OA\Property(
     *                          property="password",
     *                          type="string",  
     *                          description="Password of the customer member", 
     *                      ),
     *                  ),
     *           ),
     *      ),
     *      @OA\Response( 
     *          response=200, 
     *          description="A token for customer",
     *          @OA\JsonContent(
     *              type="string",
     *          ),
     *      ),
     *      @OA\Response(response="400", ref="#/components/responses/400"),
     *      @OA\Response(response="401", ref="#/components/responses/401"),
     *      @OA\Response(response="403", ref="#/components/responses/403"),
     *      @OA\Response(response="default", ref="#/components/responses/default"),
     * )
     * 
     * 
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function loginCustomer(Request $request): JsonResponse
    {
        //validate incoming request
        $this->validate($request, [
            'mail' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['mail', 'password']);
        // dd($this->getGuard());

        if (!$token = Auth::guard('customer')->attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $user = Auth::user();
        return $this->respondWithToken($token, $user);
    }

        /**
     * Get a JWT via given credentials.
     *  
     *  @OA\Post(
     *      path="/login/staff",
     *      summary="Get token for staff",
     *      description="Return the token of the staff",
     *      operationId="getTokenStaff",
     *      tags={"Authentification"},
     *      @OA\RequestBody(
     *           required=true,
     *           @OA\MediaType(
     *                  mediaType="application/x-www-form-urlencoded",
     *                  @OA\Schema(
     *                      type="object",
     *                      required={"login","password"},
     *                      @OA\Property(
     *                          property="login",
     *                          type="string",
     *                          description="login of the staff member", 
     *                      ),
     *                      @OA\Property(
     *                          property="password",
     *                          type="string",  
     *                          description="Password of the staff member", 
     *                      ),
     *                  ),
     *           ),
     *      ),
     *      @OA\Response( 
     *          response=200, 
     *          description="A token for staff",
     *          @OA\JsonContent(
     *              type="string",
     *          ),
     *      ),
     *      @OA\Response(response="400", ref="#/components/responses/400"),
     *      @OA\Response(response="401", ref="#/components/responses/401"),
     *      @OA\Response(response="403", ref="#/components/responses/403"),
     *      @OA\Response(response="default", ref="#/components/responses/default"),
     * )
     * 
     * 
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function loginStaff(Request $request): JsonResponse
    {
        //validate incoming request
        $this->validate($request, [
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['login', 'password']);
        
        if (!$token = Auth::guard('staff')->attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = Auth::user();
        return $this->respondWithToken($token,$user);
    }

     /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        $user = Auth::user();
        return $this->respondWithToken(auth()->refresh(),$user);
    }
      /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        Auth::logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

}
