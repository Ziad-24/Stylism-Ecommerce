<?php

use App\Http\Controllers\Admin\HandleUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Product\ProductController;
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
define('PAGINATION_COUNT',50);


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
    
    Route::group(['prefix' => 'users'] , function(){
        Route::get('/all' , [HandleUserController::class , 'getAllUsers']) -> name('admin.users.all');

        Route::get('/view/{id}' , [HandleUserController::class , 'viewUser']) -> name('admin.user.view');

        Route::get('add' , [HandleUserController::class , 'newAdminForm']) -> name('admin.user.addAdmin');
        
        Route::post('create' , [HandleUserController::class , 'createAdmin']) -> name('admin.user.createAdmin');

        Route::get('/changerole/{id}' , [HandleUserController::class , 'changeUserRole']) -> name('admin.user.changeRole');

        Route::post('delete' , [HandleUserController::class , 'deleteUser']) -> name('admin.user.delete');
    });
    
    
    Route::group(['prefix' => 'products'] , function(){

        Route::get('/all' , [ProductController::class , 'getAllProducts'])-> name('admin.products.all');
        
        Route::get('/category/{id}' , [CategoryController::class , 'getCertainCategory']) -> name('admin.category.withid');
        
        Route::post('/delete' , [ProductController::class , 'deleteProduct']) -> name('admin.product.delete');


        Route::get('/create',[ProductController::class , 'createProduct']) -> name('admin.product.create');
        Route::post('/store',[ProductController::class , 'storeProduct']) -> name('admin.product.store');

        
        // missing crud
        // then validation
    });
});


