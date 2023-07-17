<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dashboard;

class DashboardController extends Controller
{
    public function index()
    {
        $dashboards = Dashboard::all();
        return response()->json($dashboards, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'recommended_article_id' => 'required',
            'discussion_id' => 'required',
        ]);

        $dashboard = Dashboard::create($request->all());
        return response()->json($dashboard, 201);
    }

    public function show($id)
    {
        $dashboard = Dashboard::find($id);
        if (!$dashboard) {
            return response()->json('Dashboard not found', 404);
        }
        return response()->json($dashboard, 200);
    }

    public function update(Request $request, $id)
    {
        $dashboard = Dashboard::find($id);
        if (!$dashboard) {
            return response()->json('Dashboard not found', 404);
        }

        $request->validate([
            'user_id' => 'required',
            'recommended_article_id' => 'required',
            'discussion_id' => 'required',
        ]);

        $dashboard->update($request->all());
        return response()->json($dashboard, 200);
    }

    public function destroy($id)
    {
        $dashboard = Dashboard::find($id);
        if (!$dashboard) {
            return response()->json('Dashboard not found', 404);
        }

        $dashboard->delete();
        return response()->json('Dashboard deleted successfully', 200);
    }
}
