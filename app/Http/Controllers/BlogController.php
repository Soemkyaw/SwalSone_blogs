<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view("blogs.index",[
            "blogs"=> Blog::latest()->filter(request(['search','category','author']))->paginate(6),
            "categories" => Category::all()
        ]);
    }

    public function show($blog)
    {
        $blog = str_replace("_"," ", $blog);
        $blog = Blog::where("title", $blog)->first();
        return view("blogs.show", [
            "blog" => $blog,
            "randomBlogs" => Blog::inRandomOrder()->limit(3)->get()
        ]);
    }
}
