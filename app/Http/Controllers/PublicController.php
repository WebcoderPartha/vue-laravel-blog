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
        $post = Post::with('user', 'category')->findOrFail($id);
        return response()->json([
            'post' => $post
        ],200);
    }

    public function categoriesPost($id){
        $category_post = Category::with('posts')->findOrFail($id);
        return response()->json([
            'category_post' => $category_post
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


}
