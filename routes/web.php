<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PublicController@index');

Auth::routes();
Route::get('/home', 'HomeController@index');

Route::get('{any?}', 'HomeController@index')->name('home')->where('any', '.*');


Route::post('/add-category', 'CategoryController@store');
Route::get('/category', 'CategoryController@all_category');


Route::post('/savepost', 'PostController@store');
//Route::delete('/post/{id}/delete', 'PostController@delete_post');

Route::post('/post/update/{id}', 'PostController@update');
Route::get('/showblogpost', 'PublicController@showAllPost');

