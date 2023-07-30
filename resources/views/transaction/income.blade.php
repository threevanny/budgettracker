@extends('layouts/app')

@section('content')
<div class="container is-fluid">
    <h1 class="has-text-centered is-size-1">Income</h1>

    <table class="table mt-5" style="margin: 0 auto;">
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Type</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Amount</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaction->created_at->format('D d M Y') }}</td>
                    <td>
                        <span class="icon-text">
                            <span class="icon has-text-success">
                                <i class="fas fa-arrow-down"></i>
                            </span>
                            <span>{{ $transaction->type->name }}</span>
                        </span>
                    </td>
                    <td>{{ $transaction->category->name }}</td>
                    <td>{{ $transaction->subcategory->name }}</td>
                    <td class="has-text-right">{{ $transaction->amount }}</td>
                    <td>
                        <a class="button is-info is-small display-info" href="javascript:void(0);" title="{{ $transaction->about }}">
                            <span class="icon is-small">
                                <i class="fas fa-info"></i>
                            </span>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('transaction.destroy', $transaction->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="button is-danger is-small" type="submit" title="Delete Income">
                                <span class="icon is-small">
                                    <i class="fas fa-trash"></i>
                                </span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="8">
                    {{ $transactions->onEachSide(1)->links('vendor.pagination.bulma') }}
                </td>
            </tr>
        </tfoot>
    </table>
</div>
<script>
    const displayInfo = document.querySelectorAll('.display-info');
    for (let i = 0; i < displayInfo.length; i++) {
        displayInfo[i].addEventListener('click', function() {
        alert(this.getAttribute('title') ? this.getAttribute('title') : 'No information');
        });
    }
</script>
@endsection