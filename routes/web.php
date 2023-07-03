<?php

use App\Http\Controllers\TransactionController;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Type;

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

Route::get('/', [TransactionController::class, 'home'])->name('home');
Route::resource('transaction', TransactionController::class)->only(['index', 'store', 'destroy']);
Route::get('transaction/income', [TransactionController::class, 'income'])->name('transaction.income');
Route::get('transaction/expense', [TransactionController::class, 'expense'])->name('transaction.expense');
Route::get('transaction/summary', [TransactionController::class, 'summary'])->name('transaction.summary');
Route::post('transaction/getdata', [TransactionController::class, 'getdata'])->name('json.getdata');
Route::get('transaction/getdatachart', [TransactionController::class, 'getdatachart'])->name('json.getdatachart');