<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecommendedArticle;

class RecommendedArticleController extends Controller
{
    public function index()
    {
        $recommendedArticles = RecommendedArticle::all();
        return response()->json($recommendedArticles, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'curated_article_id' => 'required',
        ]);

        $recommendedArticle = RecommendedArticle::create($request->all());
        return response()->json($recommendedArticle, 201);
    }

    public function show($id)
    {
        $recommendedArticle = RecommendedArticle::find($id);
        if (!$recommendedArticle) {
            return response()->json('Recommended Article not found', 404);
        }
        return response()->json($recommendedArticle, 200);
    }

    public function update(Request $request, $id)
    {
        $recommendedArticle = RecommendedArticle::find($id);
        if (!$recommendedArticle) {
            return response()->json('Recommended Article not found', 404);
        }

        $request->validate([
            'user_id' => 'required',
            'curated_article_id' => 'required',
        ]);

        $recommendedArticle->update($request->all());
        return response()->json($recommendedArticle, 200);
    }

    public function destroy($id)
    {
        $recommendedArticle = RecommendedArticle::find($id);
        if (!$recommendedArticle) {
            return response()->json('Recommended Article not found', 404);
        }

        $recommendedArticle->delete();
        return response()->json('Recommended Article deleted successfully', 200);
    }
}
