<?php

namespace App\Http\Controllers;

use App\Models\f;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show',[
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit', [
            "user" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user,Request $request)
    {
        $attributes =$request->validate([
            'author_name' => ['required'],
            'email' => ['required'],
            'gender' => ['required', 'string', 'in:male,female,other'],
            'phone_no' => ['required', 'max:20'],
            'address' => ['required'],
        ]);
        $attributes['slug'] = str_replace(' ', '-', $attributes['author_name']);

        $user->update($attributes);

        return redirect('user/'.$user->slug.'/profile')->with('success','Your account has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
