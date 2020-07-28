<?php

namespace App\Http\Controllers;

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


}
