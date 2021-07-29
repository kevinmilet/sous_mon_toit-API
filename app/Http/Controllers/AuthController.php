<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return Response
     */
    public function loginCustomer(Request $request)
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

    public function loginStaff(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'login' => 'required|string',
            'password' => 'required|string',
        ]);
        
        $credentials = $request->only(['login', 'password']);
        // dd($this->getGuard());

        if (!$token = Auth::guard('staff')->attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

      /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

}