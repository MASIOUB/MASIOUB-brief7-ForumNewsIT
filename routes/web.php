<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('home', [App\Http\Controllers\PostController::class, 'index'])->name('posts@index');

Route::prefix('posts')->middleware(['auth'])->group(function () {
    Route::get('add_post', [\App\Http\Controllers\PostController::class, 'create']);
    Route::post('add_post', [\App\Http\Controllers\PostController::class, 'store']);
    Route::get('show_post/{post_id}', [\App\Http\Controllers\PostController::class, 'show']);
    Route::get('edit_post/{post_id}', [\App\Http\Controllers\PostController::class, 'edit']);
    Route::put('/update_post/{post_id}', [\App\Http\Controllers\PostController::class, 'update'])->name("posts@update");
    Route::get('delete_post/{post_id}', [\App\Http\Controllers\PostController::class, 'destroy']);
});

Route::post('comment/store', [\App\Http\Controllers\CommentController::class, 'store'])->name('comments@store');
Route::get('comment/{comment_id}', [\App\Http\Controllers\CommentController::class, 'destroy'])->name('comments@destroy');

// Route::prefix('profile')->middleware(['auth'])->group(function () {
    Route::get('edit_profile/{profile_id}', [\App\Http\Controllers\UserController::class, 'edit'])->name('profile@edit');
    Route::put('/update_profile/{profile_id}', [\App\Http\Controllers\UserController::class, 'update'])->name('profile@update');
// });


Route::get('posts/{post_id}/upvote', [\App\Http\Controllers\PostController::class, 'upvote'])->name('posts@upvote');
Route::get('posts/{post_id}/downvote', [\App\Http\Controllers\PostController::class, 'downvote'])->name('posts@downvote');


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::get('posts', [\App\Http\Controllers\Admin\PostController::class, 'index']);
    Route::get('delete-post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'destroy']);
    Route::get('show-post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'show']);

    Route::get('users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users@display');
    Route::get('delete-user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users@destroy');
    Route::get('show-user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('users@show');

    Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::get('edit-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::put('update-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    Route::get('delete-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
});
