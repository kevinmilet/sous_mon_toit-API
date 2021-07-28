<?php

namespace App\Http\Controllers;

use App\Models\Estates;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class EstatesController extends Controller
{
    /**
     * Retourne la liste des biens immobilier
     *
     * @return Estates[]|Collection
     */
    public function selectAllEstates()
    {
       return Estates::all();
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function selectOneEstate($id): JsonResponse
    {
        $estate =  Estates::find($id);
        return response()->json($estate);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function archive($id): JsonResponse
    {
        $estate = Estates::findOrFail($id);
        $estate->archived_at = date("Y-m-d H:i:s");
        $estate->save();

        return response()->json('Le bien immobilier a bien été archivé', 200);
    }
}
