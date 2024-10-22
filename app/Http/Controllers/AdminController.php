<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;

class AdminController extends Controller
{
    public function index()
    {
        $blogStatus = Blog::whereIn('status', ['approve', 'cancel', 'pending'])->get()->groupBy('status');
        return view("admin.dashboard",[
            "blogs" => Blog::latest()->get(),
            "approveBlogs" => $blogStatus->get('approve'),
            "cancelBlogs" => $blogStatus->get('cancel'),
            "pendingBlogs" => $blogStatus->get('pending'),
        ]);
    }

    public function blogs(User $user)
    {
        return view("admin.admin-blogs",[
            'blogs' => $user->blogs()->with('user','category')->paginate(6)
        ]);
    }


    public function profile()
    {
        return view('admin.profile',[
            'user' => auth()->user()
        ]);
    }

    public function profileEdit(User $user)
    {
        return view('admin.profile-edit', compact('user'));
    }

    public function profileUpdate(User $user,StoreUserRequest $request)
    {
        $attributes = $request->all();
        $attributes['slug'] = str_replace(' ', '-', $attributes['author_name']);
        if ($request->hasFile('avatar')) {
            $attributes['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }
        $user->update($attributes);

        return redirect('/admin/profile')->with('success','Your account has been updated!');
    }
}
