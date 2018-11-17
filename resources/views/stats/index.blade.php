@extends('layouts.admin')

@section('title', '| Statistiques')

@section('subtitle', 'Statistiques')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-light shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Vos statistiques</h5>
                        <p class="card-text">Ce graphe présente des statistiques sur vos contributions au site.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                datasets: [{
                    data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#593196',
                    borderWidth: 4,
                    pointBackgroundColor: '#593196'
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: false
                        }
                    }]
                },
                legend: {
                    display: false,
                }
            }
        });
    </script>
@endpush