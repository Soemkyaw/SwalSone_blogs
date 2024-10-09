<?php

namespace App\Http\Controllers;

use App\Models\Blog;
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

    public function statusHandler(Blog $blog)
    {
        dd(request()->all());
    }
}
