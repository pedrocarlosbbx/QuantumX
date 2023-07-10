<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'article_id' => 'required',
            'body' => 'required',
        ]);

        Comment::create($request->all());

        return redirect()->back()
                         ->with('success', 'Comment created successfully.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->back()
                         ->with('success', 'Comment deleted successfully.');
    }
}
