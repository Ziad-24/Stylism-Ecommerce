<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Category\CategoryController;
use App\Models\Category;
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


Route::group(['middleware' => 'admin' , 'prefix'=>'admin'],function(){
    
    Route::get('/' , function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::group(['prefix' => 'category'] , function(){
        Route::get('/all' , [CategoryController::class , 'getAllCategories']) -> name('admin.category.all');

        Route::get('/create' , [CategoryController::class , 'createCategories']) -> name('admin.category.create');
        Route::post('/store' , [CategoryController::class , 'storeCategories']) -> name('admin.category.store');

        

        Route::get('edit/{id}' , [CategoryController::class , 'editCategory']) -> name('admin.category.edit');
        Route::post('update' , [CategoryController::class , 'updateCategory']) -> name('admin.category.update');
        
        Route::post('delete' , [CategoryController::class , 'deleteCategory']) -> name('admin.category.delete');

    });



});


