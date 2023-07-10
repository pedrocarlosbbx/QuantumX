<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;

class DashboardController extends Controller
{
    public function index()
    {
        $dashboards = Dashboard::all();
        return view('dashboards.index', compact('dashboards'));
    }

    public function create()
    {
        return view('dashboards.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'recommended_article_id' => 'nullable',
            'discussion_id' => 'nullable',
        ]);

        Dashboard::create($request->all());

        return redirect()->route('dashboards.index')
                         ->with('success', 'Dashboard saved successfully.');
    }

    public function destroy(Dashboard $dashboard)
    {
        $dashboard->delete();

        return redirect()->route('dashboards.index')
                         ->with('success', 'Dashboard deleted successfully.');
    }
}
