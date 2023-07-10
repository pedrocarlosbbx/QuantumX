<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleTag;

class ArticleTagController extends Controller
{
    public function index()
    {
        $articleTags = ArticleTag::all();
        return response()->json($articleTags, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'article_id' => 'required',
            'tag_id' => 'required'
        ]);

        $articleTag = ArticleTag::create($request->all());
        return response()->json($articleTag, 201);
    }

    public function show($id)
    {
        $articleTag = ArticleTag::find($id);
        if (!$articleTag) {
            return response()->json('Article Tag not found', 404);
        }
        return response()->json($articleTag, 200);
    }

    public function update(Request $request, $id)
    {
        $articleTag = ArticleTag::find($id);
        if (!$articleTag) {
            return response()->json('Article Tag not found', 404);
        }

        $request->validate([
            'article_id' => 'required',
            'tag_id' => 'required'
        ]);

        $articleTag->update($request->all());
        return response()->json($articleTag, 200);
    }

    public function destroy($id)
    {
        $articleTag = ArticleTag::find($id);
        if (!$articleTag) {
            return response()->json('Article Tag not found', 404);
        }

        $articleTag->delete();
        return response()->json('Article Tag deleted successfully', 200);
    }
}
