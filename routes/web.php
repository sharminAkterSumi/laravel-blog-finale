<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postcontroller;
use App\Http\Controllers\todocontroller;
use App\Http\Controllers\backend\Rolecontroller;
use App\Http\Controllers\SocioalLogincontroller;
use App\Http\Controllers\frontend\homecontroller;
use App\Http\Controllers\backend\categorycontroller;
use App\Http\Controllers\backend\dashboardcontroller;

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

Auth::routes();
Route::get('/', [homecontroller::class,'index'])->name('frontend.home');
Route::get('/search', [homecontroller::class, 'searchPost'])->name('frontend.search');
Route::get('/front/category/{category:slug}', [homecontroller::class, 'showCategoryPost'])->name('frontend.category');
Route::get('/front/subcategory/{subcategory:slug}', [homecontroller::class, 'showSubCategoryPost'])->name('frontend.subcategory');
Route::get('/post/{slug}', [homecontroller::class, 'showPost'])->name('frontend.show');
Route::get('/google/login',[SocioalLogincontroller::class,'googlelogin'])->name('google.login');
Route::get('/google/redirect',[SocioalLogincontroller::class,'googleredirect'])->name('google.redirect');

Route::middleware('auth')->group(function(){



Route::get('/home', [dashboardcontroller::class, 'index'])->name('dashboard');



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Caregory

//role management
Route::prefix('/role')->name('role.')->group(function(){
    Route::get('/add',[Rolecontroller::class,'add'])->name('add');
    Route::post('/store',[Rolecontroller::class,'storerole'])->name('store');
    Route::get('/edit/{id}',[Rolecontroller::class,'editrole'])->name('edit');
});



Route::prefix('/category')->name('category.')->group(function(){
    Route::get('/add',[categorycontroller::class, 'add'])->name('add');
    Route::post('/category_store',[categorycontroller::class, 'store'])->name('store');
    Route::get('/edit/{category:slug}', [categorycontroller::class, 'editCategory'])->name('edit');
    Route::put('/update/{category:slug}', [categorycontroller::class, 'updateCategory'])->name('update');
    Route::delete('/delete/{category:slug}', [categorycontroller::class, 'deleteCategory'])->name('delete');


    Route::get('/sub',[categorycontroller::class, 'subAdd'])->name('sub.add');
    Route::post('/category_store/sub',[categorycontroller::class, 'storeSub'])->name('sub.store');

});


Route::prefix('/posts')->name('post.')->group(function(){

Route::get('/add',[postcontroller::class,'addpost'])->name('add');
Route::post('/store',[postcontroller::class,'store'])->name('store');
Route::get('/all-posts', [postcontroller::class, 'allPosts'])->name('all');

});



});















































































