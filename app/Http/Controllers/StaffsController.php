<?php


namespace App\Http\Controllers;

use App\Models\Staffs;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class StaffsController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function getAllStaff(): JsonResponse
    {
        return response()->json(Staffs::all());
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function getOneById($id): JsonResponse
    {
        return response()->json(Staffs::find($id));
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function archive($id): JsonResponse
    {
        $staff = Staffs::findOrFail($id);
        $staff->archived_at = date("Y-m-d H:i:s");
        $staff->save();

        return response()->json('Utilisateur archivé avec succès', 200);
    }
}
