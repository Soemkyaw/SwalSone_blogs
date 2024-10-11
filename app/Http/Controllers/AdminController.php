<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.dashboard",[
            "blogs" => Blog::latest()->get()
        ]);
    }

    public function blogs()
    {
        return view("admin.blogs");
    }

    public function blogList()
    {
        return view("admin.blog-list", [
            "blogs" => Blog::latest()->get()
        ]);
    }

    public function statusHandler(Blog $blog,Request $request)
    {
        $request->validate([
            "status" => ["required",'string','in:approve,cancel']
        ]);

        $blog->update([
            "status" => $request->status
        ]);

        return response()->json(['status'=>"success",'blogStatus'=> $request->status,'message'=> 'Blog status updated successfully!']);
    }

    public function userList()
    {
        return view("admin.user-list",[
            "users" => User::latest()->get()
        ]);
    }

    public function roleHandler(User $user,Request $request){
        $user->update([
            'is_admin' => $request->is_admin
        ]);

        return response()->json(['status' => "success", "is_admin" => $request->is_admin, 'message' => "User role updated successfully!"]);
    }

    public function userDestroy(User $user)
    {
        $user->delete();
        return response()->json(['status' => 'success']);
    }

    public function profile()
    {
        return view('admin.profile',[
            'user' => auth()->user()
        ]);
    }
}
