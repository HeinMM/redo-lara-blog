<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    public function index(){
        $posts =
            Blog::when(request('keyword'), function ($q) {
                $keyword = request('keyword');
                $q->orWhere("title", "like", "%$keyword%")
                    ->orWhere("description", "like", "%$keyword%");
            })->latest('id')->with(["category", "user"])->paginate(10)->withQueryString();
        return response()->json($posts);
    }
    public function detail($slug)
    {

        // return $slug;
        $post = Blog::where('slag', $slug)->with(['user', 'category', 'photos'])->first();

        // return $post;

        return response()->json($post);
    }
}
