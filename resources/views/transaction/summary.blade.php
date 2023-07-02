@extends('layouts/app')

@section('content')
<div class="container is-fluid">
    <h1 class="has-text-centered is-size-1">Summary</h1>

    <div class="mt-5" style="width: 80%;margin: 0 auto;">
        <canvas id="chart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function getdatachart(context){
        fetch("{{ route('json.getdatachart') }}", {
            method: "GET",
            headers: {
            "Content-Type": "application/json",
            },
        })
        .then(response => response.json())
        .then(data => {
            if(data.success){
                console.log(data);
                new Chart(context, {
                    type: 'line',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'Income',
                            data: data.income,
                            borderWidth: 1,
                        }, {
                            label: 'Expense',
                            data: data.expense,
                            borderWidth: 1,
                        }, {
                            label: 'Ending Balance',
                            data: data.balance,
                            borderWidth: 1,
                        }]
                    }, options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        }).catch(error => {
            console.error(error);
        });
    }

    const ctx = document.getElementById('chart');
    getdatachart(ctx);


</script>
@endsection