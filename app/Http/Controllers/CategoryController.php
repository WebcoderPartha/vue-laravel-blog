<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function store(Request $request){
       $this->validate($request, [
           'cat_name' => ['required', 'string', 'min:3', 'max:30', 'unique:categories']
       ]);
        $category = new Category;
        $category->cat_name = $request->cat_name;
        $category->save();
        return ['message' => 'successfull'];
    }



}
