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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post("/foods/{food}/like","App\Http\Controllers\FoodLikesController@store");
Route::delete("/foods/{food}/like","App\Http\Controllers\FoodLikesController@destroy");


Route::get("/foods", 'App\Http\Controllers\FoodController@index');

Route::post("/foods/","App\Http\Controllers\FoodController@store");
Route::get("/foods/create", 'App\Http\Controllers\FoodController@create');

Route::get("/foods/{food}", 'App\Http\Controllers\FoodController@show');

Route::get("/foods/{food}/edit", 'App\Http\Controllers\FoodController@edit');
Route::put("/foods/{food}", 'App\Http\Controllers\FoodController@update');
Route::delete("/foods/{food}", 'App\Http\Controllers\FoodController@destroy');
