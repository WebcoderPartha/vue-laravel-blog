<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{

    public function getAllPostss(){
        $posts = Post::with([
            'user',
            'category'
        ])->orderBy('id', 'desc')->get();
        return response()->json([
            'posts' => $posts
        ], 200);
    }

    public function delete_post($id){
        $post = Post::findOrFail($id);
        $post->delete();
    }


}
