<?php

namespace App\Http\Controllers;


use App\Models\Pictures;
use Illuminate\Http\JsonResponse;

class PicturesController extends Controller
{
    public function getOnePicture($id): JsonResponse
    {
        return response()->json(Pictures::find($id));
    }
}

