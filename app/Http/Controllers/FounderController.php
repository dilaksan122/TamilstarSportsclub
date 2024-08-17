<?php

namespace App\Http\Controllers;

use App\Models\Founder;
use Illuminate\Http\Request;

class FounderController extends Controller
{
    // Display a listing of the founders
    public function index()
    {
        $founders = Founder::all();
        return view('founders.index', compact('founders'));
    }

    // Show the form for creating a new founder
    public function create()
    {
        return view('founders.create');
    }

    // Store a newly created founder in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'position' => 'required',
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        Founder::create([
            'name' => $request->name,
            'image' => $imageName,
            'position' => $request->position,
        ]);

        return redirect()->route('founders.index')->with('success', 'Founder created successfully.');
    }

    // Display the specified founder
    public function show(Founder $founder)
    {
        return view('founders.show', compact('founder'));
    }

    // Show the form for editing the specified founder
    public function edit(Founder $founder)
    {
        return view('founders.edit', compact('founder'));
    }

    // Update the specified founder in the database
    public function update(Request $request, Founder $founder)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'position' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $founder->image = $imageName;
        }

        $founder->update([
            'name' => $request->name,
            'position' => $request->position,
        ]);

        return redirect()->route('founders.index')->with('success', 'Founder updated successfully.');
    }

    // Remove the specified founder from the database
    public function destroy(Founder $founder)
    {
        $founder->delete();
        return redirect()->route('founders.index')->with('success', 'Founder deleted successfully.');
    }
}
