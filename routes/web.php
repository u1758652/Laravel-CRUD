<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Github login
Route::get('login/github', 'App\Http\Controllers\Auth\LoginController@redirectToGithub');
Route::get('login/github/callback', 'App\Http\Controllers\Auth\LoginController@handleGithubCallback');

Route::post("/foods/{food}/like","App\Http\Controllers\FoodLikesController@store");
Route::delete("/foods/{food}/like","App\Http\Controllers\FoodLikesController@destroy");

Route::get("/foods/search","App\Http\Controllers\FoodController@search");

Route::get("/foods", 'App\Http\Controllers\FoodController@index');

Route::post("/foods/","App\Http\Controllers\FoodController@store");
Route::get("/foods/create", 'App\Http\Controllers\FoodController@create');

Route::get("/foods/{food}", 'App\Http\Controllers\FoodController@show');

Route::get("/foods/{food}/edit", 'App\Http\Controllers\FoodController@edit');
Route::put("/foods/{food}", 'App\Http\Controllers\FoodController@update');
Route::delete("/foods/{food}", 'App\Http\Controllers\FoodController@destroy');

Route::post('/comment/store', 'App\Http\Controllers\CommentController@store')->name('comment.add');
Route::post('/reply/store', 'App\Http\Controllers\CommentController@replyStore')->name('reply.add');


