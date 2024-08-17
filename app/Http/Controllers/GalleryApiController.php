<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryApiController extends Controller
{
    public function show()
    {
        $galleries=Gallery::all();
      
        return response()->json($galleries);
    }
}
