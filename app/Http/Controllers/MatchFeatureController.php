<?php

namespace App\Http\Controllers;

use App\Models\MatchFeature;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Rules\ValidTime;


class MatchFeatureController extends Controller
{
    public function index()
    {
        $matchFeatures = MatchFeature::paginate(10); // Paginate with 10 items per page
        return view('match_features.index', compact('matchFeatures'));
    }


    public function create()
    {
        $events = Event::all();
        return view('match_features.create', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => ['required', new ValidTime],
            'location' => 'required|string|max:255',
            'event_id' => 'required|exists:events,id',
        ]);

        MatchFeature::create($request->all());
        return redirect()->route('match-features.index');
    }

    

    public function show($id)
    {
        // Retrieve the match feature by its ID
        $matchFeature = MatchFeature::findOrFail($id);
    
        // Pass the match feature to the view
        return view('match_features.show', compact('matchFeature'));
    }
    


    public function edit($id)
    {
        // Retrieve the match feature by its ID
        $matchFeature = MatchFeature::findOrFail($id);
    
        // Retrieve all events for the dropdown selection
        $events = Event::all();
    
        // Pass the match feature and events to the view
        return view('match_features.edit', compact('matchFeature', 'events'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => ['required', new ValidTime],
            'location' => 'required|string|max:255',
            'event_id' => 'required|exists:events,id',
        ]);

        $matchFeature = MatchFeature::findOrFail($id);
        $matchFeature->update($request->all());
        return redirect()->route('match-features.index');
    }

    public function destroy(MatchFeature $matchFeature)
    {
        $matchFeature->delete();
        return redirect()->route('match_features.index')->with('success', 'Match feature deleted successfully.');
    }
}
