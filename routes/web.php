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

Route::get("test-email", function(){

    $hash = Str::random(32).uniqid();
    $user = App\User::first();

    $data = ["user" => $user, "hash" => $hash];
    $to_name = "rodriguezwillian95@gmail.com";
    $to_email = "rodriguezwillian95@gmail.com";
    dump(env("MAIL_PASSWORD"));
    \Mail::send("emails.forgotPassword", $data, function($message) use ($to_name, $to_email) {

        $message->to($to_email, $to_name)->subject("¡Recuperar contraseña!");
        $message->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));

    });

}); 

Route::get('/front-test', function () {
    return view('welcome');
});

Route::get("forgot-password", "ForgotPasswordController@index")->name("forgot.password");
Route::post("forgot-password", "ForgotPasswordController@forgot");
Route::get("/forgot-password/check/{hash}", "ForgotPasswordController@check");
Route::post("/password/update", "ForgotPasswordController@update");

Route::post("/register", "RegisterController@register");
Route::post("/login", "LoginController@authenticate");
Route::post("/get-user", "LoginController@getAuthenticatedUser");
Route::get("/email/check/{hash}", "RegisterController@check");

Route::get('google/redirect', 'GoogleLoginController@redirectToGoogle');
Route::get('google/callback', 'GoogleLoginController@handleGoogleCallback');

Route::get('facebook/redirect', 'FacebookLoginController@redirectToFacebook');
Route::get('facebook/callback', 'FacebookLoginController@callback');

Route::get("/home/products", "HomeController@fetchProduct");

Route::get("/product/{slug}", "ProductController@show");
Route::get("/format-sizes/product/{productId}", "FormatSizeController@fetchByProduct");

Route::get("profile", "ProfileController@index");
Route::post("profile/update", "ProfileController@update");

Route::get("cart", "CartController@index");
Route::post("cart/store", "CartController@store");
Route::get("cart/fetch", "CartController@fetch");
Route::post("cart/guest-fetch", "CartController@guestFetch");
Route::post("cart/delete", "CartController@deleteFromCart");

Route::get("gallery", "GalleryController@index");
Route::get("gallery/fetch", "GalleryController@fetchAll");

Route::get("about", function(){
    return view("about");
});

//Route::get("dolar-update", "DolarUpdateController@index");
Route::get("dolar-price", "DolarUpdateController@getPrice");

Route::get("/checkout/encrypt-user", "CheckoutController@encryptUser");
Route::get("/checkout/process", "CheckoutController@process");
Route::post("/checkout/encrypt-price-currency", "CheckoutController@encryptPriceCurrency");

Route::get('/paypal/pay', 'CheckoutController@payWithPayPal');
Route::get('/paypal/status', 'CheckoutController@payPalStatus');