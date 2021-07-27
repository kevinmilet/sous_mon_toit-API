<?php


namespace App\Http\Controllers;

use App\Models\Staffs;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Laravel\Lumen\Http\ResponseFactory;

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
    public function getOneById($id): jsonResponse
    {
        return response()->json(Staffs::find($id));
    }

    /**
     * @param $id
     * @return Response|ResponseFactory
     */
    public function archive($id)
    {
        $staff = Staffs::findOrFail($id);
        $staff->archived_at = date("Y-m-d H:i:s");
        $staff->save();

        return response('Utilisateur archivé avec succès', 200);
    }
}
