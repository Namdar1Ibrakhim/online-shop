<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::name('user.')->group(function(){
    Route::get('/private', [App\Http\Controllers\HomeController::class, 'home'])->middleware('auth')->name('private');
    Route::get('/private/users', [App\Http\Controllers\HomeController::class, 'users'])->middleware('auth');
    Route::get('/private/products', [App\Http\Controllers\HomeController::class, 'products'])->middleware('auth');
    Route::get('/private/categories', [App\Http\Controllers\HomeController::class, 'categories'])->middleware('auth');
    Route::get('/private/orders', [App\Http\Controllers\HomeController::class, 'orders'])->middleware('auth');

     Route::get('/private/createuser', function(){
          return view('createuser');
     })->middleware('auth')->name('createuser');

     Route::post('/private/createuser', [App\Http\Controllers\HomeController::class, 'createuser'])->middleware('auth');

     Route::get('/private/edituser/{id}', [App\Http\Controllers\HomeController::class, 'edituser'])->middleware('auth')->name('edituser');

     Route::post('/private/edituser/{id}', [App\Http\Controllers\HomeController::class, 'editthisuser'])->middleware('auth')->name('editthisuser');

     Route::get('/private/deleteuser/{id}', [App\Http\Controllers\HomeController::class, 'deleteuser'])->middleware('auth')->name('deleteuser');


     Route::get('/private/createcategory', function(){
          return view('createcategory');
     })->middleware('auth')->name('createcategory');

     Route::post('/private/createcategory', [App\Http\Controllers\HomeController::class, 'createcategory'])->middleware('auth');

     Route::get('/private/editcategory/{id}', [App\Http\Controllers\HomeController::class, 'editcategory'])->middleware('auth')->name('editcategory');

     Route::post('/private/editcategory/{id}', [App\Http\Controllers\HomeController::class, 'editthiscategory'])->middleware('auth')->name('editthiscategory');

     Route::get('/private/deletecategory/{id}', [App\Http\Controllers\HomeController::class, 'deletecategory'])->middleware('auth')->name('deletecategory');

     Route::get('/private/createproduct', function(){
          return view('createproduct', ['data' =>  Category::all()]);
     })->middleware('auth')->name('createproduct');

     Route::post('/private/createproduct', [App\Http\Controllers\HomeController::class, 'createproduct'])->middleware('auth');

     Route::get('/private/editproduct/{id}', [App\Http\Controllers\HomeController::class, 'editproduct'])->middleware('auth')->name('editproduct');
     Route::post('/private/editproduct/{id}', [App\Http\Controllers\HomeController::class, 'editthisproduct'])->middleware('auth')->name('editthisproduct');

     Route::get('/private/deleteproduct/{id}', [App\Http\Controllers\HomeController::class, 'deleteproduct'])->middleware('auth')->name('deleteproduct');

     Route::get('/private/orderconfirm/{id}', [App\Http\Controllers\HomeController::class, 'orderconfirm'])->middleware('auth') ;
     Route::get('/private/orderdeny/{id}', [App\Http\Controllers\HomeController::class, 'orderdeny'])->middleware('auth');

     



    Route::get('/login', function(){
        return view('login');
    })->name('login');
    
    Route::post('/login', [App\Http\Controllers\LoginController::class, 'login']);

   Route::get('/logout', function(){
        Auth::logout();
        return redirect(route('user.login'));
   })->name('logout');
   
   Route::get('/registration', function(){
        // if(Auth::check()){
        //     return redirect(route('user.private'));
        // }
        return view('registration');
   })->name('registration');

   Route::post('/registration', [App\Http\Controllers\RegisterController::class, 'save']);
});
