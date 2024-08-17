<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;



class EventController extends Controller
{
    public function index()
{
    $events = Event::with('matchFeatures')->paginate(10); // Paginate with 10 events per page
    return view('events.index', compact('events'));
}


    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string',
        ]);

        Event::create($request->all());
        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function show($id)
    {
        // Retrieve the event by its ID and load the related match features
        $event = Event::with('matchFeatures')->findOrFail($id);
    
        // Pass the event to the view
        return view('events.show', compact('event'));
    }
    
    public function edit($id)
    {
        $event=Event::find($id);
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string',
        ]);
    
        // Retrieve the event by its ID
        $event = Event::findOrFail($id);
    
        // Update the event with the new data
        $event->update($request->all());
    
        // Redirect to the events index with a success message
        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }
    

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
