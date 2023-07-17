<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories'
        ]);

        $category = Category::create($request->all());
        return response()->json($category, 201);
    }

    public function show($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json('Category not found', 404);
        }
        return response()->json($category, 200);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json('Category not found', 404);
        }

        $request->validate([
            'category_name' => 'required|unique:categories,category_name,' . $id
        ]);

        $category->update($request->all());
        return response()->json($category, 200);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json('Category not found', 404);
        }

        $category->delete();
        return response()->json('Category deleted successfully', 200);
    }
}
