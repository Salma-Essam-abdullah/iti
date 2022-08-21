<?php

use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */
Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard')->middleware('verified');




//user
Route::get('users', [UserController::class , 'index'])->name('users.index');
Route::get('users/create', [UserController::class , 'create'])->name('users.create');
Route::post('users', [UserController::class , 'store'])->name('users.store');
Route::get('users/{id}', [UserController::class , 'show'])->where('id', '[0-9]+')->name('users.show');
Route::get('users/{id}/edit', [UserController::class , 'edit'])->name('users.edit');
Route::put('users/{id}', [UserController::class , 'update'])->name('users.update');
Route::delete('users/{id}', [UserController::class , 'destroy'])->name('users.destroy');



Route::get('/change-password', [UserController::class , 'changePassword'])->name('change-password');
Route::post('/change-password', [UserController::class , 'updatePassword'])->name('update-password');

Route::resource('profile', ProfileController::class);

Route::get('posts', [PostController::class , 'index'])->name('posts.index');
Route::get('posts/create', [PostController::class , 'create'])->name('posts.create');
Route::post('posts', [PostController::class , 'store'])->name('posts.store');
Route::get('posts/{id}', [PostController::class , 'show'])->where('id', '[0-9]+')->name('posts.show');
Route::get('posts/{id}/edit', [PostController::class , 'edit'])->name('posts.edit');
Route::put('posts/{id}', [PostController::class , 'update'])->name('posts.update');
Route::delete('posts/{id}', [PostController::class , 'destroy'])->name('posts.destroy');
Route::post('/save/{id}', [PostController::class , 'save'])->name('posts.save');

Route::get('/follow/{user}', [FollowController::class , 'store'])->name('follow');
Route::get('/unfollow/{user}', [FollowController::class , 'destroy'])->name('unfollow');

// search
Route::get('/search', [PostController::class , 'search'])->name('search');
require __DIR__ . '/auth.php';
