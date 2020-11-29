<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\FrontSiteController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\UserController;
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
/*--NEW--*/
Route::get('/', [FrontSiteController::class, 'showHome'])->name('frontSite.home');
Route::get('home', [FrontSiteController::class, 'showHome'])->name('frontSite.home');
Route::get('blog', [FrontSiteController::class, 'showBlog'])->name('frontSite.blog');
Route::get('single', [FrontSiteController::class, 'showSingle'])->name('frontSite.single');
Route::get('contact', [FrontSiteController::class, 'showContact'])->name('frontSite.contact');
/*--Posts Controller OLD--*/
/*Route::get('listPosts', [PostController::class, 'listPost']);
Route::get('showPost', [PostController::class, 'listPost']);
Route::get('deletePost', [PostController::class, 'listPost']);
Route::get('editPost', [PostController::class, 'listPost']);
Route::get('savePost', [PostController::class, 'listPost']);
Route::get('saveEditPost', [PostController::class, 'listPost']);*/
/*--Posts Controller NEW Resource--*/
//Route::resource('users',UserController::class);
/*--Route Prefix Dashboard--*/
Route::name('dashboard.')->prefix('admin')->group(function (){
    Route::get('/',[DashboardController::class,'index']);
    Route::resource('users',UserController::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('posts',PostController::class);
//    Route::resource('comments',CommentController::class);

});

//Route::get('/', [App\Http\Controllers\FrontSiteController::class, 'showHome'])->name('frontSite.home');
//Route::get('/', [App\Http\Controllers\FrontSiteController::class, 'showBlog'])->name('frontSite.blog');
//Route::get('/', [App\Http\Controllers\FrontSiteController::class, 'showSingle'])->name('frontSite.single');
//Route::get('/', [App\Http\Controllers\FrontSiteController::class, 'showContact'])->name('frontSite.contact');


/*--OLD--*/
//Route::get('/', function () {
//    return view('welcome');
//})->name('welcome');
//
///* Change index view to home view*/
////Route::get('/', function () {
////    return view('frontSite.home');
////})->name('frontSite.home');
//
//Route::get('home', function () {
//    return view('frontSite.home');
//})->name('frontSite.home');
//
//Route::get('blog', function () {
//    return view('frontSite.blog');
//})->name('frontSite.blog');
//
//Route::get('single', function () {
//    return view('frontSite.single');
//})->name('frontSite.single');
//
//Route::get('contact', function () {
//    return view('frontSite.contact');
//})->name('frontSite.contact');
