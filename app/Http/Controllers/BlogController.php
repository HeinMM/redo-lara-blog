<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::when(request('keyword'),function($q){
            $keyword = request('keyword');
            $q->orWhere("title","like", "%$keyword%")->orWhere("description", "like", "%$keyword%");
        })-> latest('id')->paginate(10)->withQueryString();
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        $post = new Blog();
        $post->title = $request->title;
        $post->slag = Str::slug($request->title);
        $post->description = $request->description;
        $post->excerpt = Str::words($request->description,50," ......");
        $post->category_id = $request->category;
        $post->user_id = Auth::user()->id;


        if ($request->hasFile('featured_image')) {
            $newName = uniqid()."_featured_image.". $request->file('featured_image')->extension();
            $request->file('featured_image')->storeAs('public', $newName);

            $post->featured_image = $newName;
        }
        $post->save();
        return redirect()->route('blog.index')->with('status', $post->title . ' is Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('blog.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {

        if (Gate::denies('update',$blog)) {
            return abort(403,"You are not allowed to update");
        }

        $blog->title = $request->title;
        $blog->slag = Str::slug($request->title);
        $blog->description = $request->description;
        $blog->excerpt = Str::words($request->description, 50, " ......");
        $blog->category_id = $request->category;
        $blog->user_id = Auth::user()->id;


        if ($request->hasFile('featured_image')) {


            Storage::delete("public/".$blog->featured_image);


            $newName = uniqid() . "_featured_image." . $request->file('featured_image')->extension();
            $request->file('featured_image')->storeAs('public', $newName);

            $blog->featured_image = $newName;
        }

        $blog->update();

        return redirect()->route('blog.index')->with('status', $blog->title . ' is updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if (Gate::denies('delete', $blog)) {
            return abort(403, "You are not allowed to delete");
        }

        if ($blog->featured_image) {
             Storage::delete("public/" . $blog->featured_image);
        }

        $postName = $blog->title;
        $blog->delete();
        return redirect()->route('blog.index')->with('status', $postName . ' is deleted Successfully');
    }
}
