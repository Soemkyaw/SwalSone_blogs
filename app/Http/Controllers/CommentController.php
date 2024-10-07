<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriberMail;

class CommentController extends Controller
{
    //
    public function store(Blog $blog,Request $request)
    {


        $attributes = $request->validate([
            "body" => ["required"],
        ]);
        $attributes['user_id'] = auth()->id();
        $blog->comments()->create($attributes);

        $subscribers = $blog->subscribers->filter(function ($subscriber) {
            return $subscriber->id != auth()->id();
        });

        $subscribers->each(function ($subscriber) use($blog) {
            Mail::to($subscriber->email)->queue(new SubscriberMail($blog));
        });

        return redirect()->back()->with('toastSuccess', "Thank you for your comment!");
    }
}
