<?php

use App\Models\Category;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;

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

// Home Page
Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        'active' => 'home',
    ]);
});

// About Page
Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        'active' => 'about',
        "name" => "Azhari Arsyad",
        "email" => "azhari.18des@gmail.com",
        "image" => "azhari.jpeg"
    ]);
});

// Posts Page
Route::get('/posts', [PostController::class, 'index']);

// Post Page
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

// Categories Page
Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

// Login Page
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

// Login Authenticate
Route::post('/login', [LoginController::class, 'authenticate']);

// Logout
Route::post('/logout', [LoginController::class, 'logout']);

// Register Page
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

// Register Store
Route::post('/register', [RegisterController::class, 'store']);

// Dashboard Page
Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

// Register Store
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
