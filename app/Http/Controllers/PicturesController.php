<?php

namespace App\Http\Controllers;


use App\Models\Pictures;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Laravel\Lumen\Http\ResponseFactory;

class PicturesController extends Controller
{
    /**
     * @param $id_estate
     * @return JsonResponse
     */
    public function getEstatePictures($id_estate): JsonResponse
    {
        return response()->json(Pictures::where('id_estate', $id_estate)->get());
    }

    /**
     * @param $id_estate
     * @return JsonResponse
     */
    public function getEstateCover($id_estate): JsonResponse
    {
        $estate = Pictures::where('id_estate', $id_estate)->get();
        return response()->json($estate->where('cover', true));
    }

    /**
     * @param $id_estate
     * @param $id
     * @return Response|ResponseFactory
     */
    public function delete($id_estate, $id)
    {
        $estate = Pictures::where('id_estate', $id_estate)->get();
        $estate->find($id)->delete();

        return response('Image supprimée avec succès', 200);

    }

    /**
     * @param $id_estate
     * @return Response|ResponseFactory
     */
    public function deleteAll($id_estate)
    {
        Pictures::where('id_estate', $id_estate)->delete();
        return response('Les images de ce bien ont été supprimées avec succès', 200);
    }
}
