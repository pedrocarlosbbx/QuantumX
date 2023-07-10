<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'article_title' => 'required',
            'body' => 'required',
            'foto_article' => 'required',
        ]);

        Article::create($request->all());

        return redirect()->route('articles.index')
                         ->with('success', 'Article created successfully.');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'user_id' => 'required',
            'article_title' => 'required',
            'body' => 'required',
            'foto_article' => 'required',
        ]);

        $article->update($request->all());

        return redirect()->route('articles.index')
                         ->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')
                         ->with('success', 'Article deleted successfully.');
    }
}
