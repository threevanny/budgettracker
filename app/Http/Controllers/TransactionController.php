<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\TransactionRequest;
use App\Models\Type;
use App\Models\Category;
use App\Models\Subcategory;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $transactions = Transaction::all()->sortByDesc('created_at');
        $balance = 0;
        foreach ($transactions as $transaction) {
            if ($transaction->type->name == 'Income') {
                $balance += $transaction->amount;
            } else {
                $balance -= $transaction->amount;
            }
        }
        $types = Type::all();
        return view('transaction.index', compact('transactions', 'types', 'balance'));
    }

    public function home(){
        return redirect()->route('transaction.index');
    }

    public function income()
    {
        $transactions = Transaction::where('type_id', 1001)->get()->sortByDesc('created_at');
        $types = Type::all();
        $income = 0;
        foreach ($transactions as $transaction) {
            $income += $transaction->amount;
        }
        return view('transaction.income', compact('transactions', 'income', 'types'));
    }

    public function expense()
    {
        $transactions = Transaction::where('type_id', 1002)->get()->sortByDesc('created_at');
        $types = Type::all();
        $expense = 0;
        foreach ($transactions as $transaction) {
            $expense += $transaction->amount;
        }
        return view('transaction.expense', compact('transactions', 'expense', 'types'));
    }

    public function summary() {
        $types = Type::all();
        return view('transaction.summary', compact('types'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        $data = $request->validated();
        $transaction = Transaction::create($data);
        
        return response()->json([
            'success' => true,
            'message' => 'Transaction saved successfully',
            'data' => $transaction
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function getdata(Request $request)
    {
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
    }


    public function getdatachart()
    {
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
    }
}
