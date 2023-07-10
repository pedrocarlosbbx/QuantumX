<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleTag;

class ArticleTagController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'article_id' => 'required',
            'tag_id' => 'required',
        ]);

        ArticleTag::create($request->all());

        return redirect()->back()
                         ->with('success', 'Article tag created successfully.');
    }

    public function destroy(ArticleTag $articleTag)
    {
        $articleTag->delete();

        return redirect()->back()
                         ->with('success', 'Article tag deleted successfully.');
    }
}
