<?php

namespace App\Http\Controllers;

use App\Models\Video;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class VideoApiController extends Controller
{
    public function view()
    {
        $video=Video::all();
        if(!$video)
        {
            return response()->json(["message","data not found"],404);
        }

        return response()->json($video);
    }
}
