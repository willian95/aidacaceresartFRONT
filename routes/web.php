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

Route::get("/", function(){

    return view("comingSoon");

});

Route::get('/front-test', function () {
    return view('welcome');
});

Route::post("/register", "RegisterController@register");
Route::post("/login", "LoginController@authenticate");
Route::post("/get-user", "LoginController@getAuthenticatedUser");
Route::get("/email/check/{hash}", "RegisterController@check");

Route::get('google/redirect', 'GoogleLoginController@redirectToGoogle');
Route::get('google/callback', 'GoogleLoginController@handleGoogleCallback');