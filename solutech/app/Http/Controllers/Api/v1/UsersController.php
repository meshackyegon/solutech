<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        return User::all();
    }
    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'User Stored',
            'data' => $user
        ]);

    }
    public function show($id)
    {
        return response()->json(User::find($id));
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return response()->json([
            'success'=> true,
            'message'=> 'update successfull',
            'data'=> $user
            ]);
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'success'=> true,
            'message'=> 'delete successfull',
            'data'=> $user
            ]);
    }
}
