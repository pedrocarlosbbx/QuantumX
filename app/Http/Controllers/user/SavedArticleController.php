<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SavedArticle;

class SavedArticleController extends Controller
{
    public function index()
    {
        $savedArticles = SavedArticle::all();
        return response()->json($savedArticles, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'article_id' => 'required',
        ]);

        $savedArticle = SavedArticle::create($request->all());
        return response()->json($savedArticle, 201);
    }

    public function show($id)
    {
        $savedArticle = SavedArticle::find($id);
        if (!$savedArticle) {
            return response()->json('Saved Article not found', 404);
        }
        return response()->json($savedArticle, 200);
    }

    public function update(Request $request, $id)
    {
        $savedArticle = SavedArticle::find($id);
        if (!$savedArticle) {
            return response()->json('Saved Article not found', 404);
        }

        $request->validate([
            'user_id' => 'required',
            'article_id' => 'required',
        ]);

        $savedArticle->update($request->all());
        return response()->json($savedArticle, 200);
    }

    public function destroy($id)
    {
        $savedArticle = SavedArticle::find($id);
        if (!$savedArticle) {
            return response()->json('Saved Article not found', 404);
        }

        $savedArticle->delete();
        return response()->json('Saved Article deleted successfully', 200);
    }
}
