@extends('layouts/app')

@section('content')
<div class="container is-fluid">
    <h1 class="has-text-centered is-size-1">Summary</h1>

    <div class="mt-5" style="width: 80%;margin: 0 auto;">
        <canvas id="chart" data-url="{{ route('json.getdatachart') }}"></canvas>
    </div>
</div>
@endsection