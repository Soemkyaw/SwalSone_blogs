<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest();
        if (request('search')) {
            $blogs = $blogs->where('title','like','%'. request('search').'%');
        }
        return view("blogs.index",[
            "blogs"=> $blogs->paginate(6),
            "categories" => Category::all()
        ]);
    }
}
