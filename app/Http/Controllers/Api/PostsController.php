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

//    public function store_post(Request $request){
//        $post = Auth::user();
//        $data = [
//            'title'         => $request->title,
//            'description'   => $request->description,
//            'photo'   => $request->photo,
//            'cat_id'   => $request->cat_id
//        ];
//
//        if ($file = $request->file('photo')){
//            $filename = $file->getClientOriginalName();
//            $path = public_path().'/images/';
//            $file->move($path, $filename);
//            $data['photo'] = $filename;
//        }
//
//        $post->posts()->create($data);
//    }
    public function save_post(Request $request){

//        $post = Auth::user();
//        $post->posts()->create([
//            'title' =>  $request->title,
//            'description' =>  $request->description,
//            'cat_id' =>  $request->cat_id
//        ]);;
//        $post = new Post;
//        $post->title = $request->title;
//        $post->description = $request->description;
//        $post->cat_id = $request->cat_id;
//        $post->user_id = Auth::user()->name;

        Post::create([
            'title'         =>  $request->title,
            'description'   =>  $request->description,
            'cat_id'        =>  $request->cat_id,
            'user_id'       =>  auth()->user()->id
        ]);

    }

}
