<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['user', 'category'])->get();
        return $posts;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_post(Request $request)
    {
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
//        Post::create($data);
//        return response()->json(['message' => 'Successfully'], 200);
        return 'bangla';

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $strpos = strpos($request->photo, ';');
        $substr = substr($request->photo, 0, $strpos);
        $explode = explode('/', $substr)[1];
        $name = time().'.'.$explode;
        $img = Image::make($request->photo)->resize(400, 600);
        $upload_path = public_path().'/images/';
        $img->save($upload_path.$name);


        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->cat_id = $request->cat_id;
        $post->user_id = Auth::user()->id;
        $post->photo = $name;
        $post->save();
//        Post::create([
//            'title'         =>  $request->title,
//            'description'   =>  $request->description,
//            'cat_id'        =>  $request->cat_id,
//            'user_id'       =>  Auth::user()->id,
//            'photo'         => $name
//
//        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



//    public function delete_post($id){
//        $post = Post::find($id);
//
//        unlink(public_path().'/images/'.$post->photo);
//        $post->delete();
//
//    }

    public function destroy($id)
    {
        //
    }
}
