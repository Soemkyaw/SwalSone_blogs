<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register()
    {
        return view("auth.register");
    }

    public function store(Request $request)
    {
        $attributes =$request->validate([
            "author_name" => ["required","string","min:3","max:225"],
            "email" => ["required", "email", "min:6", "max:225"],
            "password"=> ["required","confirmed","min:5","max:100"],
        ]);
        $attributes['slug'] = str_replace(' ', '-', $attributes['author_name']);
        $user = User::create($attributes);
        auth()->login($user);
        return redirect("/")->with("success","Account register success.");
    }

    public function login()
    {
        return view("auth.login");
    }

    public function loginUser(Request $request)
    {
        $attributes = $request->validate([
            "email" => ["required", "email", "min:6", "max:225", "exists:users,email"],
            "password" => ["required", "min:5", "max:100"],
        ]);
        if (auth()->attempt($attributes)) {
            return redirect("/")->with("toastSuccess","Welcome From SwalSone Blogs.");
        }else{
            return redirect()->back()->withErrors(["email"=> "User Credentials don't match."]);
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect("/")->with("toastSuccess","You have been logged out");
    }
}
