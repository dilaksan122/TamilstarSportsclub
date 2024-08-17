<?php

namespace App\Http\Controllers;

use App\Models\ClubInfo;
use Illuminate\Http\Request;

class ClubInfoApiController extends Controller
{
    public function show()
    {
        $club=ClubInfo::first();

       

        return response()->json($club);
    }
}
