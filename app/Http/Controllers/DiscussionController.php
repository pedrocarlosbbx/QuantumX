<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discussion;

class DiscussionController extends Controller
{
    public function index()
    {
        $discussions = Discussion::all();
        return view('discussions.index', compact('discussions'));
    }

    public function create()
    {
        return view('discussions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'tag_id' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);

        Discussion::create($request->all());

        return redirect()->route('discussions.index')
                         ->with('success', 'Discussion created successfully.');
    }

    public function show(Discussion $discussion)
    {
        return view('discussions.show', compact('discussion'));
    }

    public function edit(Discussion $discussion)
    {
        return view('discussions.edit', compact('discussion'));
    }

    public function update(Request $request, Discussion $discussion)
    {
        $request->validate([
            'user_id' => 'required',
            'tag_id' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);

        $discussion->update($request->all());

        return redirect()->route('discussions.index')
                         ->with('success', 'Discussion updated successfully.');
    }

    public function destroy(Discussion $discussion)
    {
        $discussion->delete();

        return redirect()->route('discussions.index')
                         ->with('success', 'Discussion deleted successfully.');
    }
}
