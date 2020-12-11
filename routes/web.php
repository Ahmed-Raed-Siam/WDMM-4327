<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\FrontSiteController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserTrashController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\PostController;
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
//$prefixes = [
//    'dashboard', 'admin'
//];
Route::name('dashboard.')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    /*OLD*/
    // Route::get('users/'.'trash', [UserController::class, 'users_trash_index'])->name('users.trash.index');
    // Route::get('users/trash', [UserTrashController::class, 'index'])->name('users.trash.index');
    // Route::get('users/trash/{user_id}', [UserTrashController::class, 'destroy'])->name('users.trash.destroy');
    // Route::put('users/trash/{user_id}', [UserTrashController::class, 'restore'])->name('users.trash.restore');
     Route::patch('users/trash/{user_id}', [UserTrashController::class, 'restore'])->name('users.trash.restore');
    /*Restore Route*/
/*    Route::match(['put', 'patch'], 'users/trash/{user_id}', [
        'users/trash/{user_id}' => [UserTrashController::class, 'restore'],
        'as' => 'users.trash.restore',
    ]);*/
    Route::name('users')->resource('users/trash', UserTrashController::class)->parameters([
        'trash' => 'user_id'
    ])->only([
        'index', 'show', 'destroy'
    ]);
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
//    Route::resource('comments',CommentController::class);

});
