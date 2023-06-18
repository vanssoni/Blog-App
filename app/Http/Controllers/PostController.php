<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       if(\Auth::user()->is_admin){
           $posts =  Post::with(['category', 'user'])->latest()->get();
       }else{
            $posts =  Post::with(['category', 'user'])->where('user_id', \Auth::id())->latest()->get();
       }
       return view('modules.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('modules.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request,[
            'title' => 'required|max:191',
            'content' => 'required',
            'category_id' => 'required|integer',
        ]);
        if($request->hasFile('featured_image')){
            $image_name = time().'.'.$request->featured_image->extension();  
            $request->featured_image->move(storage_path('app/public/blogs/'), $image_name);
        }
        $validator['user_id'] = \Auth::id();
        $validator['featured_image'] = @$image_name;
        Post::create($validator);
        return back()->withSuccess('Blog created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $post= Post::where('slug', $slug)->with(['category', 'user'])->first();
        if(!$post){
            abort(404);
        }
        $related_blogs = Post::whereHas('category', function($q) use($post){
            $q->where('category_id', $post->category_id);
        })->where('id','!=', $post->id)->with(['category', 'user'])->get();
        return view('modules.posts.show', compact('post','related_blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        if(\Auth::user()->is_admin){
            $post = Post::where('slug', $slug)->first();
        }else{
            
            $post = Post::where('slug', $slug)->where('user_id', \Auth::id())->first();
        }
        if(!$post){
            abort(404);
        }
        $categories = Category::orderBy('name')->get();
        return view('modules.posts.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        if(\Auth::user()->is_admin){
            $post = Post::where('slug', $slug)->first();
        }else{
            $post = Post::where('slug', $slug)->where('user_id', \Auth::id())->first();
        }
        if(!$post){
            abort(404);
        }
        $validator = $this->validate($request,[
            'title' => 'required|max:191',
            'content' => 'required',
            'category_id' => 'required|integer',
        ]);
        if($request->remove_featured_image && $post->getRawOriginal('featured_image')){
            $imagePath = storage_path('app/public/blogs/').$post->getRawOriginal('featured_image');
            //delete image from storage 
            if( file_exists($imagePath) ){
                unlink($imagePath);
            }
            $validator['featured_image'] = '';
        }
        if($request->hasFile('featured_image')){
            $image_name = time().'.'.$request->featured_image->extension();  
            $request->featured_image->move(storage_path('app/public/blogs/'), $image_name);
            $validator['featured_image'] = $image_name;
        }
        $post->update($validator);
        return back()->withSuccess('Blog updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        if(\Auth::user()->is_admin){
            $post = Post::where('slug', $slug)->first();
        }else{
            $post = Post::where('slug', $slug)->where('user_id', \Auth::id())->first();
        }
        if(!$post){
            abort(404);
        }

        if($post->getRawOriginal('featured_image')){
            $imagePath = storage_path('app/public/blogs/').$post->getRawOriginal('featured_image');
            //delete image from storage 
            if( file_exists($imagePath) ){
                unlink($imagePath);
            }
        }
        $post->delete();
        return back()->withSuccess('Blog deleted successfully!');
    }
    public function getPostsByCategory(Request $request , $slug)
    {
        $posts = Post::whereHas('category', function($q) use($slug){
            $q->where('slug', $slug);
        })->with(['category', 'user'])->latest()->paginate(5);
        return view('home', compact('posts'));
    }
}
