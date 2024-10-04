<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        $attributes = $request->validate([
            "body" => ["required"],
            "blog_id" => ['required']
        ]);

        $attributes['blog_id'] = (int)$attributes['blog_id'];
        $attributes['user_id'] = auth()->id();

        // dd($attributes);
        Comment::create($attributes);

        return redirect()->back()->with('toastSuccess', "Thank you for your comment!");
    }
}
