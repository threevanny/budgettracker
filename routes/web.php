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