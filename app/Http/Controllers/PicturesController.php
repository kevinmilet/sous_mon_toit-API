<?php

namespace App\Http\Controllers;


use App\Models\Pictures;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Http\ResponseFactory;

class PicturesController extends Controller
{
    /**
     * @throws ValidationException
     */
    private function validation($request): array
    {
        return $this->validate($request,
            [
                'name' => 'nullable|sometimes|image|mimes:jpeg,jpg,png|max:2048|required',
                'cover' => 'boolean|required',
            ]);
    }

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

    /**
     * @param Request $request
     * @param $id_estate
     * @return Response|ResponseFactory
     * @throws ValidationException
     */
    public function uploadPicture(Request $request, $id_estate)
    {
        $validated = $this->validation($request);

        if ($request->hasFile('name')) {
            $img = $request->file('name');
            $name = uniqid('estate_') . '.' . $img->getClientOriginalExtension();
            $destinationPath = storage_path('/app/public/pictures/estates/');
            $img->move($destinationPath, $name);
        } else {
            $name = null;
        }

        $picture = new Pictures;
        $picture->create([
            'folder' => '/estates',
            'name' => $name,
            'cover' => $validated['cover'],
            'alt' => $name,
            'id_estate' => $id_estate
        ]);

        return response('L\'image à bien été uploadée', 200);
    }
}
