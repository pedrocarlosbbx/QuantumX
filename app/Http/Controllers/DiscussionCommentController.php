<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiscussionComment;

class DiscussionCommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'discussion_id' => 'required',
            'body' => 'required',
        ]);

        DiscussionComment::create($request->all());

        return redirect()->back()
                         ->with('success', 'Discussion comment created successfully.');
    }

    public function destroy(DiscussionComment $comment)
    {
        $comment->delete();

        return redirect()->back()
                         ->with('success', 'Discussion comment deleted successfully.');
    }
}
