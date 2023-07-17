<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discussion;

class DiscussionController extends Controller
{
    public function index()
    {
        $discussions = Discussion::all();
        return response()->json($discussions, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'tag_id' => 'required',
            'title' => 'required',
            'text' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $file = $request->file('image');
        $file_name = time() . "_" . $file->getClientOriginalName();
        $destination = 'discussion_images';
        $file->move($destination, $file_name);

        $data = $request->all();
        $data['image'] = $destination . "/" . $file_name;

        $discussion = Discussion::create($data);
        return response()->json($discussion, 201);
    }

    public function show($id)
    {
        $discussion = Discussion::find($id);
        if (!$discussion) {
            return response()->json('Discussion not found', 404);
        }
        return response()->json($discussion, 200);
    }

    public function update(Request $request, $id)
    {
        $discussion = Discussion::find($id);
        if (!$discussion) {
            return response()->json('Discussion not found', 404);
        }

        $request->validate([
            'user_id' => 'required',
            'tag_id' => 'required',
            'title' => 'required',
            'text' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = time() . "_" . $file->getClientOriginalName();
            $destination = 'discussion_images';
            $file->move($destination, $file_name);

            $discussion->image = $destination . "/" . $file_name;
        }

        $discussion->update($request->all());
        return response()->json($discussion, 200);
    }

    public function destroy($id)
    {
        $discussion = Discussion::find($id);
        if (!$discussion) {
            return response()->json('Discussion not found', 404);
        }

        $discussion->delete();
        return response()->json('Discussion deleted successfully', 200);
    }
}
