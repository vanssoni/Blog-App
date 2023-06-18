<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('posts/category/{slug}', 'PostController@getPostsByCategory')->name('posts-by-category');
//authenticated routes
Route::group(['middleware' => ['auth:web']], function() {
    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);
});
