<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Exports\PostsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\PostController;

// Route::get('/', function () {
//     return view('welcome');
// });



Route::resource('posts', PostController::class);

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
})->name('home');

Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::resource('posts', PostController::class)->middleware('auth'); // Ensure authentication for posts


Route::get('/contact', [ContactController::class, 'index'])->name('posts.contact');

Route::get('posts/export/', function () {
    return Excel::download(new PostsExport, 'posts.xlsx');
})->name('posts.export');
