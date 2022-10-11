@extends('layouts.app1')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <canvas id="myChart" width="500" height="500"></canvas>
            </div>
        </div>
    </div>
@endsection


@section('headerContent')
@endsection

@section('footerContent')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [{{$value_chart}}],
                datasets: [{
                    label: '# of Votes',
                    data: [{{$value_chart}}],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: false
                    }
                }
            }
        });
    </script>
@endsection

