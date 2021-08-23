<?php

namespace App\Http\Controllers;


use App\Models\Estates;
use App\Models\Pictures;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Http\ResponseFactory;
use PHPUnit\Util\Exception;

class PicturesController extends Controller
{
    /**
     * @throws ValidationException
     */
    private function validation($request): array
    {
        return $this->validate($request,
            [
                'name' => 'image|mimes:jpeg,jpg,png|max:2048|required',
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
     * @param Request $request
     * @param $id_estate
     * @return Response|ResponseFactory
     * @throws ValidationException
     */
    public function uploadPicture(Request $request, $id_estate)
    {
        try {
            $validated = $this->validation($request);
            if ($request->hasFile('name')) {
                $img = $request->file('name');
                $name = uniqid('estate_id_' . $id_estate . '_') . '.' . $img->getClientOriginalExtension();
                $altAttribute = Estates::find($id_estate)->title . ' - ' . Estates::find($id_estate)->reference . ' - ' . time();
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
                'alt' => $altAttribute,
                'id_estate' => $id_estate
            ]);

            return response('L\'image à bien été uploadée', 200);
        } catch (Exception $e) {
            throw new Exception('Upload de l\image impossible. ' . $e->getMessage());
        }
    }

    /**
     * @param $id_estate
     * @param $id
     * @return Response|ResponseFactory
     */
    public function delete($id_estate, $id)
    {
        if (!empty($id) && !empty($id_estate)) {
            try {
                $path = storage_path('/app/public/pictures/estates/');
                $estate = Pictures::where('id_estate', $id_estate)->get();

                if ($estate->find($id) != null) {
                    $file = $estate->find($id)->name;
                } else {
                    return response('Image introuvable', 404);
                }

                File::delete($path . $file);
                $estate->find($id)->delete();
                return response('Image supprimée avec succès - ' . $file, 200);

            } catch (Exception $e) {
                throw new Exception('Suppression de l\image impossible. ' . $e->getMessage());
            }
        } else {
            return response('Image introuvable', 404);
        }
    }

    /**
     * @param $id_estate
     * @return Response|ResponseFactory
     */
    public function deleteAll($id_estate)
    {
        if (!empty($id_estate)) {
            try {
                $path = storage_path('/app/public/pictures/estates/');

                foreach (Pictures::where('id_estate', $id_estate)->cursor() as $picture) {
                    File::delete($path . $picture->name);
                    $picture->delete();
                }

                return response('Les images de ce bien ont été supprimées avec succès', 200);
            } catch (Exception $e) {
                throw new Exception('Suppression des images impossible. ' . $e->getMessage());
            }
        } else {
            return response('Images introuvables', 404);
        }
    }
}
