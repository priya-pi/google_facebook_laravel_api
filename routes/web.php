<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\GoogleAuthController;

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
// Route::get('/', function () {
//     return view('facebook.login');
// });


// Route::get('home',[SocialAuthController::class,'index'])->middleware('auth');
// Route::post('logout',[SocialAuthController::class, 'logout'])->name('logout');

Route::get('/auth/facebook/redirect',[SocialAuthController::class,'facebookRedirect'])->name('facebookRedirect');
Route::get('/auth/facebook/callback',[SocialAuthController::class,'facebookCallback'])->name('facebookCallback');

Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirectToGoogle'])->name('googleRedirect');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback'])->name('googleCallback');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
