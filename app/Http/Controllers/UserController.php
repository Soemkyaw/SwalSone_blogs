<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
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
        $this->authorize('view', $user);
        return view('user.show',[
            'user' => $user
        ]);
    }

    public function blogs(User $user)
    {
        $this->authorize('blogs', $user);
        return view('user.blogs',[
            'blogs' => $user->blogs()->latest()->paginate(6)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('edit', $user);
        return view('user.edit', [
            "user" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user,StoreUserRequest $request)
    {
        $attributes = $request->all();
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
