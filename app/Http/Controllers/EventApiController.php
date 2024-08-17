<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Event;
use App\Models\MatchFeature;
use App\Models\Sportstar;
use Illuminate\Http\Request;

class EventApiController extends Controller
{
    public function getAllEvents()
    {
        $events = Event::all();
        return response()->json($events);
    }

    public function getEventWithMatches($id)
    {
        $event = Event::with('matchFeatures')->find($id);
        if ($event) {
            return response()->json($event);
        } 
    }
    public function getAllMatchFeatures()
    {
        $matchFeatures = MatchFeature::all();
        return response()->json($matchFeatures);
    }

    public function getMatchesByEvent($eventId)
    {
        $matches = MatchFeature::where('event_id', $eventId)->get();
        return response()->json($matches);
    }

    public function showAbout()
    {
        $about=AboutUs::all();
        
        return response()->json($about);
    }
}
