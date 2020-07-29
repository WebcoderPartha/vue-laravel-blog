<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PostsController extends Controller
{

    public function getAllPostss(){
        $posts = Post::with([
            'user',
            'category'
        ])->orderBy('id', 'desc')->paginate(5);
        return response()->json([
            'posts' => $posts
        ], 200);
    }
    public function edit($id){
        $post = Post::findOrFail($id);

        return response()->json([
            'post' => $post
        ]);
    }
    public function delete_post($id){
        $post = Post::find($id);

        $image_path = public_path().'/images/'.$post->photo;

        if (file_exists($image_path)){
            @unlink($image_path);
        }

        $post->delete();

        return response()->json([
            'post' => $post
        ], 200);
    }


}
