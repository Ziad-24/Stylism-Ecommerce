<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Site\NavigationController;
use App\Http\Controllers\Site\ProductController;
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

Route::get('/', [NavigationController::class , 'index'])-> name('site.homepage');
Route::get('/latest-products' , [NavigationController::class , 'allLatestProducts']) -> name('site.latestProducts');
Route::get('/all-products' , [NavigationController::class , 'allProducts']) -> name('site.allProducts');
Route::get('/products-with-category/{id}' , [NavigationController::class , 'productsInCategoryFromAProduct']) -> name('site.productInCategory');
Route::get('/products-with-category/{id}' , [NavigationController::class , 'productsInCategoryFromACategory']) -> name('site.productInCategoryFromCategory');
Route::get('/product/{id}' , [ProductController::class , 'getProduct']) -> name('site.product');
Route::get('/all-categories' , [NavigationController::class , 'allCategories']) -> name('site.allCategories');


Auth::routes(['verify'=>true]);
Route::group(['prefix'=>'login/google'] , function(){
    //  google redirect
    Route::get('/redirect', [LoginController::class , 'googleRedirect']) -> name('login.google');
    Route::get('/callback', [LoginController::class , 'googleCallback']);

});

Route::group(['middleware'=>'auth'] , function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
});
