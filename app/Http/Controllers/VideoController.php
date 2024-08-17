<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('videos.index', compact('videos'));
    }

    public function create()
    {
        return view('videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|file|max:100000', // 100MB max size
        ]);

        $filePath = $request->file('file')->store('videos', 'public');

        Video::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
        ]);

        return redirect()->route('videos.index')->with('success', 'Video uploaded successfully.');
    }

    public function show(Video $video)
    {
        return view('videos.show', compact('video'));
    }

    public function destroy(Video $video)
    {
        Storage::disk('public')->delete($video->file_path);
        $video->delete();

        return redirect()->route('videos.index')->with('success', 'Video deleted successfully.');
    }
}
