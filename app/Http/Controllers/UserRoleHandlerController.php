<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserRoleHandlerController extends Controller
{
    public function userList()
    {
        return view("admin.user-list",[
            "users" => User::latest()->with('blogs')->get()
        ]);
    }

    public function roleHandler(User $user,Request $request){
        $user->update([
            'is_admin' => $request->is_admin
        ]);

        return response()->json(['status' => "success", "is_admin" => $request->is_admin, 'message' => "User role updated successfully!"]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['status' => 'success']);
    }
}
