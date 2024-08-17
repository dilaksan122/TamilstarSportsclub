<?php

namespace App\Http\Controllers;

use App\Models\Founder;
use Illuminate\Http\Request;

class FounderApiController extends Controller
{
    public function index()
    {
        $founder=Founder::all();
      

        return response()->json($founder);
    }
}
