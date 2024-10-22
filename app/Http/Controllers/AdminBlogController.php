<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogRequest;

class AdminBlogController extends Controller
{
    public function index()
    {
        return view("admin.blogs.blog-list", [
            "blogs" => Blog::latest()->with('user','category')->get()
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

    public function create()
    {
        return view('admin.blogs.create',[
            'categories' => Category::all()
        ]);
    }

    public function store(StoreBlogRequest $request)
    {
        $attributes = $request->all();
        $attributes['slug'] = str_replace(' ', '-', $attributes['title']);
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');

        Blog::create($attributes);

        return redirect('/admin/blog/list')->with('toastSuccess', 'New blog successfully created!');
    }
}
