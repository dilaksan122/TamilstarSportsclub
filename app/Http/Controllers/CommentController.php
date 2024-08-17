<?php

// app/Http/Controllers/CommentController.php

// app/Http/Controllers/CommentController.php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $newsId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment = Comment::create([
            'news_id' => $newsId,
            'content' => $request->input('content'),
        ]);

        return response()->json($comment, 201);
    }

    public function index($newsId)
    {
        $comments = Comment::where('news_id', $newsId)->get();
        return response()->json($comments);
    }

    // app/Http/Controllers/CommentController.php


     public function view()
    {
        // Fetch all comments with their associated news
        $comments = Comment::with('news')->paginate(10);

        // Return the view with the comments
        return view('comments.view', compact('comments'));
    }
}
