<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return response()->json($comments, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'article_id' => 'required',
            'body' => 'required'
        ]);

        $comment = Comment::create($request->all());
        return response()->json($comment, 201);
    }

    public function show($id)
    {
        $comment = Comment::find($id);
        if (!$comment) {
            return response()->json('Comment not found', 404);
        }
        return response()->json($comment, 200);
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        if (!$comment) {
            return response()->json('Comment not found', 404);
        }

        $request->validate([
            'user_id' => 'required',
            'article_id' => 'required',
            'body' => 'required'
        ]);

        $comment->update($request->all());
        return response()->json($comment, 200);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        if (!$comment) {
            return response()->json('Comment not found', 404);
        }

        $comment->delete();
        return response()->json('Comment deleted successfully', 200);
    }
}
