<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index',[
            'categories' => Category::latest()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'min:3']
        ]);
        $attributes['slug'] = str_replace(' ', '-', $attributes['name']);

        Category::create($attributes);

        return redirect('/admin/category/list')->with('toastSuccess', 'New category successfully created!');
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Category $category,Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'min:3']
        ]);
        $attributes['slug'] = str_replace(' ', '-', $attributes['name']);

        $category->update($attributes);

        return redirect('/admin/category/list')->with('toastSuccess', 'Category successfully updated!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('toastSuccess','Category successfully deleted!');
    }
}
