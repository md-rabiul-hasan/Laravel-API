<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;
use Illuminate\Support\Facades\Hash;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/articles', 'ArticleController@getAllArticle');
Route::get('/articles/{article}', 'ArticleController@getArticle');

Route::middleware('auth:api')->group(function(){
    Route::post('/articles', 'ArticleController@saveArticle');
    Route::put('/articles/{id}', 'ArticleController@updateArticle');
    Route::delete('/articles/{id}', 'ArticleController@deleteArticle');
});


Route::middleware('auth:api')->get('/user', function(Request $request) {
    return $request->user();
});

Route::get('/create',function(){
    User::forceCreate([
        "name" => "Rabiul Hasan",
        "email" => "xhasan.me@gmail.com",
        "password" => Hash::make("xhasan.me")
    ]);
    User::forceCreate([
        "name" => "Nizam Uddin",
        "email" => "nizam@gmail.com",
        "password" => Hash::make("nizamuddin")
    ]);
});

Route::get('/token',function(){
    $user = USER::findOrFail(2);
    $user->api_token = Str::random(60);
    $user->save();
});