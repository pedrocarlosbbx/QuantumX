<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiscussionComment;   

class DiscussionCommentController extends Controller
{
    public function index()
    {
        $discussionComments = DiscussionComment::all();
        return response()->json($discussionComments, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'discussion_id' => 'required',
            'text' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $file = $request->file('image');
        $file_name = time() . "_" . $file->getClientOriginalName();
        $destination = 'discussion_comment_images';
        $file->move($destination, $file_name);

        $data = $request->all();
        $data['image'] = $destination . "/" . $file_name;

        $discussionComment = DiscussionComment::create($data);
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
            'text' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = time() . "_" . $file->getClientOriginalName();
            $destination = 'discussion_comment_images';
            $file->move($destination, $file_name);

            $discussionComment->image = $destination . "/" . $file_name;
        }

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
