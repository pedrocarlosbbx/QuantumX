<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Search;

class SearchController extends Controller
{
    public function index()
    {
        $searches = Search::all();
        return view('searches.index', compact('searches'));
    }

    public function create()
    {
        return view('searches.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'category_id' => 'nullable',
            'article_id' => 'nullable',
            'tag_id' => 'nullable',
            'keyword' => 'required',
        ]);

        Search::create($request->all());

        return redirect()->route('searches.index')
                         ->with('success', 'Search saved successfully.');
    }

    public function destroy(Search $search)
    {
        $search->delete();

        return redirect()->route('searches.index')
                         ->with('success', 'Search deleted successfully.');
    }
}
