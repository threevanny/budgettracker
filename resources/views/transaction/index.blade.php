@extends('layouts/app')

@section('content')
<div class="container is-fluid">
    <h1 class="has-text-centered is-size-1">{{ $balance }}</h1>
    <p class="has-text-centered has-text-grey-light is-size-6">Current Balance</p>
    <!-- <div class="mt-5 has-text-centered">
        <a class="icon-text is-clickable custom-trigger">
            <span class="icon">
                <i class="fas fa-arrow-circle-down fa-lg"></i>
            </span>
            <span></span>
        </a>
    </div> -->
    <table class="table is-small mt-5 custom-table" id="custom-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Type</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaction->created_at->format('D d M Y') }}</td>
                    @if ($transaction->type->id == 1001)
                        <td>
                            <span class="icon-text">
                                <span class="icon has-text-success">
                                    <i class="fas fa-arrow-down"></i>
                                </span>
                                <span>{{ $transaction->type->name }}</span>
                            </span>
                            <!-- <span class="tag is-success"><p>{{ $transaction->type->name }}</p></span> -->
                        </td>
                    @else
                        <td>
                            <span class="icon-text">
                                <span class="icon has-text-danger">
                                    <i class="fas fa-arrow-up"></i>
                                </span>
                                <span>{{ $transaction->type->name }}</span>
                            </span>
                            <!-- <span class="tag is-danger"><p>{{ $transaction->type->name }}</p></span> -->
                        </td>
                    @endif
                    <td>{{ $transaction->category->name }}</td>
                    <td>{{ $transaction->subcategory->name }}</td>
                    <td class="has-text-right">{{ $transaction->amount }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection