<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    // Display a listing of the news.
    public function index()
    {
        $news = News::paginate(10); // Display 10 news items per page
        return view('news.index', compact('news'));
    }
    

    // Show the form for creating a new news item.
    public function create()
    {
        return view('news.create');
    }

    // Store a newly created news item in storage.
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        News::create($data);

        return redirect()->route('news.index')->with('success', 'News created successfully.');
    }

    // Display the specified news item.
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    // Show the form for editing the specified news item.
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    // Update the specified news item in storage.
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $news->update($data);

        return redirect()->route('news.index')->with('success', 'News updated successfully.');
    }

    // Remove the specified news item from storage.
    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        $news->delete();

        return redirect()->route('news.index')->with('success', 'News deleted successfully.');
    }
}
