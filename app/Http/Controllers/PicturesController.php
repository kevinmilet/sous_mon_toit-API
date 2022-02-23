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
                'name' => 'image|mimes:jpeg,jpg,png|max:2048',
                'cover' => '',
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
            // $validated = $this->validation($request);
            if ($request->hasFile('fileCover')) {
                //Enregistrement de l'image dans le storage 
                $img = $request->file('fileCover');
                $name = uniqid('estate_id_' . $id_estate . '_') . '.' . $img->getClientOriginalExtension();
                $altAttribute = Estates::find($id_estate)->title . ' - ' . Estates::find($id_estate)->reference . ' - ' . time();
                $destinationPath = storage_path('/app/public/pictures/estates/');
                $img->move($destinationPath, $name);

                //Enregistrement en base
                $picture = new Pictures;
                $picture->create([
                    'folder' => '/estates',
                    'name' => $name,
                    'cover' => 1,
                    'alt' => $altAttribute,
                    'id_estate' => $id_estate
                ]);
            } 

            if ($request->hasFile('file1')) {
                $img = $request->file('file1');
                $name = uniqid('estate_id_' . $id_estate . '_') . '.' . $img->getClientOriginalExtension();
                $altAttribute = Estates::find($id_estate)->title . ' - ' . Estates::find($id_estate)->reference . ' - ' . time();
                $destinationPath = storage_path('/app/public/pictures/estates/');
                $img->move($destinationPath, $name);

                $picture = new Pictures;
                $picture->create([
                    'folder' => '/estates',
                    'name' => $name,
                    'cover' => 0,
                    'alt' => $altAttribute,
                    'id_estate' => $id_estate
                ]);
            } 

            if ($request->hasFile('file2')) {
                $img = $request->file('file2');
                $name = uniqid('estate_id_' . $id_estate . '_') . '.' . $img->getClientOriginalExtension();
                $altAttribute = Estates::find($id_estate)->title . ' - ' . Estates::find($id_estate)->reference . ' - ' . time();
                $destinationPath = storage_path('/app/public/pictures/estates/');
                $img->move($destinationPath, $name);

                $picture = new Pictures;
                $picture->create([
                    'folder' => '/estates',
                    'name' => $name,
                    'cover' => 0,
                    'alt' => $altAttribute,
                    'id_estate' => $id_estate
                ]);
            }

            if ($request->hasFile('file3')) {
                $img = $request->file('file3');
                $name = uniqid('estate_id_' . $id_estate . '_') . '.' . $img->getClientOriginalExtension();
                $altAttribute = Estates::find($id_estate)->title . ' - ' . Estates::find($id_estate)->reference . ' - ' . time();
                $destinationPath = storage_path('/app/public/pictures/estates/');
                $img->move($destinationPath, $name);

                $picture = new Pictures;
                $picture->create([
                    'folder' => '/estates',
                    'name' => $name,
                    'cover' => 0,
                    'alt' => $altAttribute,
                    'id_estate' => $id_estate
                ]);
            } 

            return response('La ou les images ont bien étaient uploadées', 200);
        } catch (Exception $e) {
            throw new Exception('Upload de l\image impossible. ' . $e->getMessage());
        }
    }

    /**
     * @param $id_estate
     * @param $id
     * @return Response|ResponseFactory
     */
    public function delete($id_picture)
    {
        if (!empty($id_picture)) {
            try {

                $path = storage_path('/app/public/pictures/estates/');
                $filename = Pictures::findOrFail($id_picture)->name;
                // Suppression du fichier 
                File::delete($path . $filename);
                // Supression de l'image en base de données
                Pictures::findOrFail($id_picture)->delete();

                return response('Image "' . $filename . '" supprimée avec succès', 200);

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
