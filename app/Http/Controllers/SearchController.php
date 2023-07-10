<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Search;

class SearchController extends Controller
{
    public function index()
    {
        $searches = Search::all();
        return response()->json($searches, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'category_id' => 'required',
            'article_id' => 'required',
            'tag_id' => 'required',
            'keyword' => 'required',
        ]);

        $search = Search::create($request->all());
        return response()->json($search, 201);
    }

    public function show($id)
    {
        $search = Search::find($id);
        if (!$search) {
            return response()->json('Search not found', 404);
        }
        return response()->json($search, 200);
    }

    public function update(Request $request, $id)
    {
        $search = Search::find($id);
        if (!$search) {
            return response()->json('Search not found', 404);
        }

        $request->validate([
            'user_id' => 'required',
            'category_id' => 'required',
            'article_id' => 'required',
            'tag_id' => 'required',
            'keyword' => 'required',
        ]);

        $search->update($request->all());
        return response()->json($search, 200);
    }

    public function destroy($id)
    {
        $search = Search::find($id);
        if (!$search) {
            return response()->json('Search not found', 404);
        }

        $search->delete();
        return response()->json('Search deleted successfully', 200);
    }
}
