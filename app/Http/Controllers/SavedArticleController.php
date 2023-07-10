<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SavedArticle;

class SavedArticleController extends Controller
{
    public function index()
    {
        $savedArticles = SavedArticle::all();
        return view('saved_articles.index', compact('savedArticles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'article_id' => 'required',
        ]);

        SavedArticle::create($request->all());

        return redirect()->back()
                         ->with('success', 'Article saved successfully.');
    }

    public function destroy(SavedArticle $savedArticle)
    {
        $savedArticle->delete();

        return redirect()->back()
                         ->with('success', 'Article unsaved successfully.');
    }
}
