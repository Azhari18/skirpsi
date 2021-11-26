<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\User;

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
Route::get('posts/{post:slug}', [PostController::class, 'show']);

// Categories Page
Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

// Category Page
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'title' => "Post By Category : $category->name",
        'active' => 'categories',
        'posts' => $category->posts->load('category', 'author'),        
    ]);
});

//Author Page
Route::get('/authors/{author:username}', function (User $author) {
    return view('Posts', [
        'title' => "Post By Author : $author->name",
        'active' => 'posts',
        'posts' => $author->posts->load('category', 'author')       
    ]);
});
