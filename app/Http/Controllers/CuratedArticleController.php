<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CuratedArticle;

class CuratedArticleController extends Controller
{
    public function index()
    {
        $curatedArticles = CuratedArticle::all();
        return view('curated_articles.index', compact('curatedArticles'));
    }

    public function create()
    {
        return view('curated_articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'article_id' => 'required',
        ]);

        CuratedArticle::create($request->all());

        return redirect()->route('curated_articles.index')
                         ->with('success', 'Curated article created successfully.');
    }

    public function destroy(CuratedArticle $curatedArticle)
    {
        $curatedArticle->delete();

        return redirect()->route('curated_articles.index')
                         ->with('success', 'Curated article deleted successfully.');
    }
}
