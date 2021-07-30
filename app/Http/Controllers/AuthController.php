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

        return $this->respondWithToken($token);
    }

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

        return $this->respondWithToken($token);
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
        return $this->respondWithToken(auth()->refresh());
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
