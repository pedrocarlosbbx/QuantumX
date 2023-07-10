<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecommendedArticle;

class RecommendedArticleController extends Controller
{
    public function index()
    {
        $recommendedArticles = RecommendedArticle::all();
        return view('recommended_articles.index', compact('recommendedArticles'));
    }

    public function create()
    {
        return view('recommended_articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'curated_article_id' => 'required',
        ]);

        RecommendedArticle::create($request->all());

        return redirect()->route('recommended_articles.index')
                         ->with('success', 'Recommended article created successfully.');
    }

    public function destroy(RecommendedArticle $recommendedArticle)
    {
        $recommendedArticle->delete();

        return redirect()->route('recommended_articles.index')
                         ->with('success', 'Recommended article deleted successfully.');
    }
}
