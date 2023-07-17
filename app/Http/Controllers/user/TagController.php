<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return response()->json($tags, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tag_name' => 'required|unique:tags'
        ]);

        $tag = Tag::create($request->all());
        return response()->json($tag, 201);
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        if (!$tag) {
            return response()->json('Tag not found', 404);
        }
        return response()->json($tag, 200);
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        if (!$tag) {
            return response()->json('Tag not found', 404);
        }

        $request->validate([
            'tag_name' => 'required|unique:tags,tag_name,' . $id
        ]);

        $tag->update($request->all());
        return response()->json($tag, 200);
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        if (!$tag) {
            return response()->json('Tag not found', 404);
        }

        $tag->delete();
        return response()->json('Tag deleted successfully', 200);
    }
}
