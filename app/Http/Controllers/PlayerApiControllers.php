<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerApiControllers extends Controller
{
    public function index()
    {
        $players = Player::all();
       
        return response()->json($players);
    }

    public function newsindex()
    {
        $news=News::all();
       
        return response()->json($news);
    }

    public function newsview($id)
    {
        $news=News::find($id);
       
        return response()->json($news);

    }

}