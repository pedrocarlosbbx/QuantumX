<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
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
            'text' => 'required',
            'image' => 'file|image|mimes:jpeg,png,jpg'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $file_name);
            $data['image'] = $file_name;
        }

        $comment = Comment::create($data);
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
            'text' => 'required',
            'image' => 'file|image|mimes:jpeg,png,jpg'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $file_name);
            $data['image'] = $file_name;
        }

        $comment->update($data);
        return response()->json($comment, 200);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        if (!$comment) {
            return response()->json('Comment not found', 404);
        }

        if ($comment->image) {
            // Delete the comment's image file from the server
            $image_path = public_path('images') . '/' . $comment->image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        $comment->delete();
        return response()->json('Comment deleted successfully', 200);
    }
}
