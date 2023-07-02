@extends('layouts/app')

@section('content')
<div class="container is-fluid">
    <h1 class="has-text-centered is-size-1">158.000,25</h1>
    <p class="has-text-centered is-size-6">Current Balance</p>

    <table class="table mt-5" style="margin: 0 auto;">
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Type</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Amount</th>
                <th>About</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaction->created_at->format('D d M Y') }}</td>
                    <td>{{ $transaction->type->name }}</td>
                    <td>{{ $transaction->category->name }}</td>
                    <td>{{ $transaction->subcategory->name }}</td>
                    <td class="has-text-right">{{ $transaction->amount }}</td>
                    <td>{{ $transaction->about }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection