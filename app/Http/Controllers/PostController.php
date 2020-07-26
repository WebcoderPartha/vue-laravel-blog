<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        if ($file = $request->file('photo')){
            $name = $file->getClientOriginalName();
            $directory = public_path().'/images/';
            $file->move($directory,$name);
            $request->photo = $name;
        }
        Post::create([
            'title'         =>  $request->title,
            'description'   =>  $request->description,
            'cat_id'        =>  $request->cat_id,
            'user_id'       =>  Auth::user()->id,
            'photo'         => $request->photo

        ]);

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
    public function destroy($id)
    {
        //
    }
}
