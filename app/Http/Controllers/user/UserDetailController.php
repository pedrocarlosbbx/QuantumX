<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserDetail;

class UserDetailController extends Controller
{
    public function index()
    {
        $userDetails = UserDetail::all();
        return response()->json($userDetails, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'foto_profile' => 'required',
            'bio' => 'required',
        ]);

        $userDetail = UserDetail::create($request->all());
        return response()->json($userDetail, 201);
    }

    public function show($id)
    {
        $userDetail = UserDetail::find($id);
        if (!$userDetail) {
            return response()->json('User Detail not found', 404);
        }
        return response()->json($userDetail, 200);
    }

    public function update(Request $request, $id)
    {
        $userDetail = UserDetail::find($id);
        if (!$userDetail) {
            return response()->json('User Detail not found', 404);
        }

        $request->validate([
            'user_id' => 'required',
            'foto_profile' => 'required',
            'bio' => 'required',
        ]);

        $userDetail->update($request->all());
        return response()->json($userDetail, 200);
    }

    public function destroy($id)
    {
        $userDetail = UserDetail::find($id);
        if (!$userDetail) {
            return response()->json('User Detail not found', 404);
        }

        $userDetail->delete();
        return response()->json('User Detail deleted successfully', 200);
    }
}
