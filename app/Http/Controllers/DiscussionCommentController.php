<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiscussionComment;

class DiscussionCommentController extends Controller
{
    public function index()
    {
        $discussionComment = DiscussionComment::all();
        return response()->json($discussionComment, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'discussion_id' => 'required',
            'body' => 'required'
        ]);

        $discussionComment = DiscussionComment::create($request->all());
        return response()->json($discussionComment, 201);
    }

    public function show($id)
    {
        $discussionComment = DiscussionComment::find($id);
        if (!$discussionComment) {
            return response()->json('Discussion Comment not found', 404);
        }
        return response()->json($discussionComment, 200);
    }

    public function update(Request $request, $id)
    {
        $discussionComment = DiscussionComment::find($id);
        if (!$discussionComment) {
            return response()->json('Discussion Comment not found', 404);
        }

        $request->validate([
            'user_id' => 'required',
            'discussion_id' => 'required',
            'body' => 'required'
        ]);

        $discussionComment->update($request->all());
        return response()->json($discussionComment, 200);
    }

    public function destroy($id)
    {
        $discussionComment = DiscussionComment::find($id);
        if (!$discussionComment) {
            return response()->json('Discussion Comment not found', 404);
        }

        $discussionComment->delete();
        return response()->json('Discussion Comment deleted successfully', 200);
    }
}
