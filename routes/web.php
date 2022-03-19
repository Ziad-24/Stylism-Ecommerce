<?php

use App\Http\Controllers\Auth\LoginController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify'=>true]);
Route::group(['prefix'=>'login/google'] , function(){
    //  google redirect
    Route::get('/redirect', [LoginController::class , 'googleRedirect']) -> name('login.google');
    Route::get('/callback', [LoginController::class , 'googleCallback']);

});

Route::group(['middleware'=>'auth'] , function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
});
