<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->group(function(){
    Route::get('/category', 'CategoriesController@all_category');
    Route::delete('/category/delete/{id}', 'CategoriesController@deleteCategory');
    Route::get('/edit-category/{id}', 'CategoriesController@EditCategory');
    Route::put('/update-category/{id}', 'CategoriesController@UpdateCategory');
    Route::get('/local-category', 'CategoriesController@globalcategory');


    Route::post('/savepost', 'PostsController@save_post');
    Route::delete('/post/{id}/delete', 'PostsController@delete_post');
    Route::get('/posts/edit/{id}', 'PostsController@edit');
    Route::get('/getposts', 'PostsController@getAllPostss');
});

//post for public
Route::get('/showblogpost', 'PublicController@showAllPost');
Route::get('/showpost/{id}', 'PublicController@show');

//category for public
Route::get('/categories/{id}', 'PublicController@categoriesPost');
Route::get('/getcategory', 'PublicController@categories');
Route::get('/getsidebarpost', 'PublicController@sidebarpost');
