<?php


namespace App\Http\Controllers;


use App\Models\Roles;
use Illuminate\Http\JsonResponse;

class RolesController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function getAllRoles(): JsonResponse
    {
        return response()->json(Roles::all());
    }
}
