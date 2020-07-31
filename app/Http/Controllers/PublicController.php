<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        return view('public.index');
    }

    public function showAllPost(){
        $posts = Post::with('user', 'category')->orderBy('created_at', 'desc')->paginate(2);
        return response()->json([
           'posts' => $posts
        ], 200);
    }

    public function show($id){
        $post = Post::with('user', 'category')->where('id', $id)->first();
        return response()->json([
            'post' => $post
        ],200);
    }



    public function categories(){
        $categories = Category::withCount('posts')->get();
        return response()->json([
            'categories' => $categories
        ], 200);
    }
    public function sidebarpost(){
        $posts = Post::all();
        return response()->json([
            'posts' => $posts
        ], 200);
    }
    public function categoriesPost($id){
        $category_post = Post::with('user', 'category')->where('cat_id', $id)->get();
        return response()->json([
            'category_post' => $category_post
        ],200);
    }

    public function search_post(){
        $search = \Request::get('s');
        $posts = Post::with('user', 'category')->where('title', 'LIKE', "%$search%")->orWhere('description', 'LIKE', "%$search%")->paginate(5);
        return response()->json([
            'posts' => $posts
        ], 200);
    }

}
