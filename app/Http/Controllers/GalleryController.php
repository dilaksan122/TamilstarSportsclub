<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::paginate(10); // Adjust the number as needed
        return view('galleries.index', compact('galleries'));
    }
    

    public function create()
    {
        return view('galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
        ]);

        $path = $request->file('image')->store('images', 'public');

        Gallery::create([
            'title' => $request->title,
            'image' => $path,
            'description' => $request->description,
        ]);

        return redirect()->route('galleries.index')->with('success', 'Gallery created successfully.');
    }

    public function show($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('galleries.show', compact('gallery'));
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('galleries.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($gallery->image);
            $path = $request->file('image')->store('images', 'public');
            $gallery->image = $path;
        }

        $gallery->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('galleries.index')->with('success', 'Gallery updated successfully.');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        Storage::disk('public')->delete($gallery->image);
        $gallery->delete();

        return redirect()->route('galleries.index')->with('success', 'Gallery deleted successfully.');
    }
}
