<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories =  Category::withCount('posts')->orderBy('name', 'ASC')->get();
       return view('modules.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request,[
            'name' => 'required|max:191|unique:categories',
        ]);
        Category::create($validator);
        return back()->withSuccess('Category created successfully!');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if(!$category){
            abort(404);
        }
        return view('modules.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->first();
        if(!$category){
            abort(404);
        }
        $validator = $this->validate($request,[
            'name' => 'required|max:191|unique:categories,name,'.$category->id,
        ]);
        $category->update($validator);
        return back()->withSuccess('Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if(!$category){
            abort(404);
        }
        $category->delete();
        return back()->withSuccess('Category deleted successfully!');
    }
}