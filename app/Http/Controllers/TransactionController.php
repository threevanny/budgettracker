<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\TransactionRequest;
use App\Models\Type;

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
}
