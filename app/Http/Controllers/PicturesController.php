<?php

<<<<<<< HEAD

namespace App\Http\Controllers;


use App\Models\Pictures;
use App\Models\Staffs;
use Illuminate\Http\JsonResponse;

class PicturesController extends Controller
{
    public function getOnePicture($id): JsonResponse
    {
        return response()->json(Pictures::find($id));
    }
=======
namespace App\Http\Controllers;

class PicturesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
>>>>>>> origin/ethan
}
