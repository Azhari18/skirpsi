<?php

use App\Http\Controllers\DashboardGoodController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoodController;
use App\Http\Controllers\TransactionController;

// use App\Http\Controllers\TransactionController;

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
    return view('dashboard.index');
});

// Goods Page
Route::resource('/dashboard/goods', DashboardGoodController::class);

// Store goods data
Route::post('/good', [GoodController::class, 'store']);

// Transaction Page
Route::get('/transaction', [TransactionController::class, 'index']);


