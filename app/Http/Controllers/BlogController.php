<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogRequest;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->where('status','approve')->filter(request(['search','category','author']));
        return view("blogs.index",[
            'blogs' => $blogs->with('category','user')->paginate(6),
            "categories" => Category::all()
        ]);
    }

    public function show(Blog $blog)
    {
        $comments = Comment::where('blog_id', $blog->id)->with('blog','user')->latest();
        return view("blogs.show", [
            "blog" => $blog,
            "randomBlogs" => Blog::inRandomOrder()->with('category','user')->where('status','approve')->limit(3)->get(),
            'comments' =>   $comments->paginate(5)
        ]);
    }

    public function create()
    {
        return view('blogs.create',[
            'categories' => Category::all()
        ]);
    }

    public function store(StoreBlogRequest $request)
    {
        $attributes = $request->all();
        $attributes['user_id'] = auth()->id();
        $attributes['slug'] = str_replace(' ','-',$attributes['title']);
        $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');

        Blog::create($attributes);

        return redirect('/')->with('toastSuccess', 'New blog successfully created!');
    }

    public function edit(Blog $blog)
    {
        return view('blogs.edit',[
            'blog' => $blog,
            'categories' => Category::all()
        ]);
    }

    public function update(Blog $blog,StoreBlogRequest $request)
    {
        $attributes = $request->all();
        if ($request->file('thumbnail')) {
            $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }
        $blog->update($attributes);

        return redirect('/blog/'. $blog->slug)->with('toastSuccess',"$blog->title successfully updated!");
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect('/')->with('toastSuccess', 'Blog successfully deleted!');
    }

    public function subscriptionHandler(Blog $blog)
    {
        if (auth()->user()->isSubscribed($blog)) {
            $blog->subscribers()->detach(auth()->id());
        }else{
            $blog->subscribers()->attach(auth()->id());
        }

        return back();
    }
}
