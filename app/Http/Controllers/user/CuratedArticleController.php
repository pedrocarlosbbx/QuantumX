<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CuratedArticle;

class CuratedArticleController extends Controller
{
    public function index()
    {
        $curatedArticles = CuratedArticle::all();
        return response()->json($curatedArticles, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'article_id' => 'required',
            'status' => 'required'
        ]);

        $curatedArticle = CuratedArticle::create($request->all());
        return response()->json($curatedArticle, 201);
    }

    public function show($id)
    {
        $curatedArticle = CuratedArticle::find($id);
        if (!$curatedArticle) {
            return response()->json('Curated Article not found', 404);
        }
        return response()->json($curatedArticle, 200);
    }

    public function update(Request $request, $id)
    {
        $curatedArticle = CuratedArticle::find($id);
        if (!$curatedArticle) {
            return response()->json('Curated Article not found', 404);
        }

        $request->validate([
            'article_id' => 'required',
            'status' => 'required'
        ]);

        $curatedArticle->update($request->all());
        return response()->json($curatedArticle, 200);
    }

    public function destroy($id)
    {
        $curatedArticle = CuratedArticle::find($id);
        if (!$curatedArticle) {
            return response()->json('Curated Article not found', 404);
        }

        $curatedArticle->delete();
        return response()->json('Curated Article deleted successfully', 200);
    }

}
