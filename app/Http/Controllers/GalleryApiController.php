<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryApiController extends Controller
{
    public function show()
    {
        $galleries=Gallery::all();
        if(!$galleries)
        {
            return response()->json(["message","data not found"],404);
        }

        return response()->json($galleries);
    }
}
