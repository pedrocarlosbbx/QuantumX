<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;

class UserDetailController extends Controller
{
    public function index()
    {
        $user_details = UserDetail::all();
        return view('user_details.index', compact('user_details'));
    }

    public function create()
    {
        return view('user_details.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'foto_profile' => 'required',
            'bio' => 'required',
        ]);

        UserDetail::create($request->all());

        return redirect()->route('user_details.index')
                         ->with('success', 'UserDetail created successfully.');
    }

    public function show(UserDetail $profile)
    {
        return view('user_details.show', compact('profile'));
    }

    public function edit(UserDetail $profile)
    {
        return view('user_details.edit', compact('profile'));
    }

    public function update(Request $request, UserDetail $profile)
    {
        $request->validate([
            'user_id' => 'required',
            'foto_profile' => 'required',
            'bio' => 'required',
        ]);

        $profile->update($request->all());

        return redirect()->route('user_details.index')
                         ->with('success', 'UserDetail updated successfully.');
    }

    public function destroy(UserDetail $profile)
    {
        $profile->delete();

        return redirect()->route('user_details.index')
                         ->with('success', 'UserDetail deleted successfully.');
    }
}
