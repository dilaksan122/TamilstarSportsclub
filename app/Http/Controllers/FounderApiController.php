<?php

namespace App\Http\Controllers;

use App\Models\Founder;
use Illuminate\Http\Request;

class FounderApiController extends Controller
{
    public function index()
    {
        $founder=Founder::all();
        if(!$founder)
        {
            return response()->json(['message','data not found'],404);
        }

        return response()->json($founder);
    }
}
