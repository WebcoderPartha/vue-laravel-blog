<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function all_category(){
        $categories = Category::latest()->paginate(5);
        return response()->json([
            'categories' => $categories
        ], 200);
    }

    public function deleteCategory($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return  response()->json([
            'category' =>$category
        ], 200);
    }
    public function EditCategory($id){
        $category = Category::findOrFail($id);
        return response()->json([
            'category' => $category
        ], 200);
    }

    public function UpdateCategory(Request $request, $id){
        $update_category = Category::find($id);
        $update_category->cat_name = $request->cat_name;
        $update_category->save();
    }

    // Show edit post and Create post select option
    public function globalcategory(){
        $category = Category::all();
        return response()->json([
            'categorieses' => $category
        ], 200);
    }

}
