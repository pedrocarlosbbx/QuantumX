<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ArticleCategory;

class ArticleCategoryController extends Controller
{
    public function index()
    {
        $articleCategories = ArticleCategory::all();
        return response()->json($articleCategories, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'article_id' => 'required',
            'category_id' => 'required'
        ]);

        $articleCategory = ArticleCategory::create($request->all());
        return response()->json($articleCategory, 201);
    }

    public function show($id)
    {
        $articleCategory = ArticleCategory::find($id);
        if (!$articleCategory) {
            return response()->json('Article Category not found', 404);
        }
        return response()->json($articleCategory, 200);
    }

    public function update(Request $request, $id)
    {
        $articleCategory = ArticleCategory::find($id);
        if (!$articleCategory) {
            return response()->json('Article Category not found', 404);
        }

        $request->validate([
            'article_id' => 'required',
            'category_id' => 'required'
        ]);

        $articleCategory->update($request->all());
        return response()->json($articleCategory, 200);
    }

    public function destroy($id)
    {
        $articleCategory = ArticleCategory::find($id);
        if (!$articleCategory) {
            return response()->json('Article Category not found', 404);
        }

        $articleCategory->delete();
        return response()->json('Article Category deleted successfully', 200);
    }
}
