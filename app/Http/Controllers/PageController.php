<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $posts =
        Blog::when(request('keyword'), function ($q) {
            $keyword = request('keyword');
            $q->orWhere("title", "like", "%$keyword%")
            ->orWhere("description", "like", "%$keyword%");
        })->latest('id')->with(["category", "user"])->paginate(10)->withQueryString();
        return view('page',compact('posts'));
    }
    public function detail($slug)
    {

        // return $slug;
        $post =Blog::where('slag', $slug)->with(['user', 'category', 'photos'])->first();

        // return $post;

        return view('detail',compact('post'));
    }

    public function postByCategory(Category $category){
        $posts = Blog::where(function ($q) {
            $q->when(request('keyword'), function ($q) {
                $keyword = request('keyword');
                $q->orWhere("title", "like", "%$keyword%")
                ->orWhere("description", "like", "%$keyword%");
            });
        })
            ->where("category_id", $category->id)
            ->latest("id")
            ->with(['user', 'category'])
            ->paginate(10)
            ->withQueryString();
        return view('page', compact('posts', 'category'));
    }
}
