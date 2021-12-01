<?php

use App\Http\Controllers\DashboardCustomerController;
use App\Http\Controllers\DashboardDebtController;
use App\Http\Controllers\DashboardGoodController;
use App\Http\Controllers\DashboardTransactionController;
use App\Http\Controllers\DashboardTransactionDetailController;
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

// Transactions Page
Route::resource('/dashboard/transactions', DashboardTransactionController::class);

// Transaction Details Page
Route::resource('/dashboard/transactiondetails', DashboardTransactionDetailController::class);



// Debts Page
Route::resource('/dashboard/debts', DashboardDebtController::class);

// Customers Page
Route::resource('/dashboard/customers', DashboardCustomerController::class);

// Store goods data
Route::post('/good', [GoodController::class, 'store']);

// Transaction Page
Route::resource('/transaction', TransactionController::class);



