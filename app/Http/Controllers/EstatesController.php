<?php

namespace App\Http\Controllers;

use App\Models\Estates;

class EstatesController extends Controller
{
    /**
     * Retourne la liste des biens immobilier
     *
     * @return Estates[]|\Illuminate\Database\Eloquent\Collection
     */
    public function selectAllEstates()
    {
       return Estates::all();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function selectOneEstate($id)
    {

        $estate =  Estates::find($id);
        return response()->json($estate);
    }
}
