<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discussion;

class DiscussionController extends Controller
{
    public function index()
    {
        $discussions = Discussion::all();
        return response()->json($discussions, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'tag_id' => 'required',
            'title' => 'required',
            'body' => 'required'
        ]);

        $discussion = Discussion::create($request->all());
        return response()->json($discussion, 201);
    }

    public function show($id)
    {
        $discussion = Discussion::find($id);
        if (!$discussion) {
            return response()->json('Discussion not found', 404);
        }
        return response()->json($discussion, 200);
    }

    public function update(Request $request, $id)
    {
        $discussion = Discussion::find($id);
        if (!$discussion) {
            return response()->json('Discussion not found', 404);
        }

        $request->validate([
            'user_id' => 'required',
            'tag_id' => 'required',
            'title' => 'required',
            'body' => 'required'
        ]);

        $discussion->update($request->all());
        return response()->json($discussion, 200);
    }

    public function destroy($id)
    {
        $discussion = Discussion::find($id);
        if (!$discussion) {
            return response()->json('Discussion not found', 404);
        }

        $discussion->delete();
        return response()->json('Discussion deleted successfully', 200);
    }
}
