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

Route::get('/', function () {
    return redirect()->action([TransactionController::class, 'index']);
});

Route::resource('transaction', TransactionController::class)->only(['index', 'store']);

Route::get('/summary', function () {
    $types = Type::all();
    return view('transaction.summary', compact('types'));
})->name('transaction.summary');

Route::post('/getdata', function (Request $request) {
    switch ( $request['task'] ){
        case 'type':
            $data = Category::where('type_id', $request['id'])->orderBy('name', 'asc')->get();
            return response()->json(['success' => true, 'data' => $data]);
            break;
        case 'category':
            $data = Subcategory::where('category_id', $request['id'])->orderBy('name', 'asc')->get();
            return response()->json(['success' => true, 'data' => $data]);
            break;
        default:
            return response()->json(['success' => false, 'data' => []]);
    }
})->name('json.getdata');

Route::get('/getdatachart', function (Request $request) {
    $labels = Transaction::selectRaw('DATE_FORMAT(created_at, "%b") as month')
        ->groupBy('month')
        ->orderBy('month', 'desc')
        ->pluck('month');

    $income = Transaction::where('type_id', 1001)
        ->selectRaw('DATE_FORMAT(created_at, "%b") as month')
        ->selectRaw('SUM(amount) as total')
        ->groupBy('month')
        ->orderBy('month', 'desc')
        ->pluck('total');

    $expense = Transaction::where('type_id', 1002)
        ->selectRaw('DATE_FORMAT(created_at, "%b") as month')
        ->selectRaw('SUM(amount) as total')
        ->groupBy('month')
        ->orderBy('month', 'desc')
        ->pluck('total');

    $balance = $income->map(function ($value, $key) use ($expense) {
        return $value - $expense[$key];
    });

    return response()->json([
        'success' => true,
        'labels' => $labels,
        'income' => $income,
        'expense' => $expense,
        'balance' => $balance,
    ], 200);
})->name('json.getdatachart');