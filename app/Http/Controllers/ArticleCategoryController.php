<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleCategory;

class ArticleCategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'article_id' => 'required',
            'category_id' => 'required',
        ]);

        ArticleCategory::create($request->all());

        return redirect()->back()
                         ->with('success', 'Article category created successfully.');
    }

    public function destroy(ArticleCategory $articleCategory)
    {
        $articleCategory->delete();

        return redirect()->back()
                         ->with('success', 'Article category deleted successfully.');
    }
}
