<!-- resources/views/pages/analytics.blade.php -->
@extends('layouts.app')

@section('content')

    <div class="row mt-3">
        <div class="col-md-4">
            <div class="text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Sales</h5>
                    <p class="card-text">${{ number_format($totalSales->sum(), 2) }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center">
                <div class="card-body">
                    <h5 class="card-title">Top Selling Movie</h5>
                    <p class="card-text">{{ $topSellingMovie }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center">
                <div class="card-body">
                    <h5 class="card-title">Top Selling Theater</h5>
                    <p class="card-text">{{ $topSellingTheater }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <h2 class="text-center mb-4">Total Daily Sales</h2>
        <canvas id="totalSalesChart"></canvas>
    </div>

    <div class="card mb-4" style="margin-top:30px">
        <h2 class="text-center mb-4">Movie Sales</h2>
        <canvas id="movieSalesChart"></canvas>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // Chart for total sales
            var totalSalesChart = new Chart(document.getElementById('totalSalesChart').getContext('2d'), {
                type: 'line',
                data: {
                    labels: @json($dates),
                    datasets: [{
                        label: 'Total Daily Sales',
                        data: @json($totalSales),
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Date'
                            },
                            type: 'time',
                            time: {
                                unit: 'day'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Sales in Dollars'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });


            const chartData = @json($chartData);

            // Extract unique dates across all movies for the x-axis and sort them
            const dates = Array.from(
                new Set(
                    Object.values(chartData).flatMap(movie => movie.sales.map(entry => entry.date))
                )
            ).sort();

            // Prepare dataset for each movie
            const datasets = Object.values(chartData).map(movie => {
                const salesData = dates.map(date => {
                    const dayData = movie.sales.find(entry => entry.date === date);
                    return dayData ? dayData.sales_amount : 0;
                });
                return {
                    label: movie.title,
                    data: salesData,
                    borderColor: getRandomColor(),
                    borderWidth: 1,
                    fill: false,
                };
            });

            // Create the Movie Sales chart
            new Chart(document.getElementById('movieSalesChart').getContext('2d'), {
                type: 'line',
                data: {
                    labels: dates,
                    datasets: datasets
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Date'
                            },
                            type: 'time',
                            time: {
                                unit: 'day'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Sales in Dollars'
                            },
                            beginAtZero: true
                        }
                    }
                }
                });


            function getRandomColor() {
                var letters = '0123456789ABCDEF';
                var color = '#';
                for (var i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }
        });
    </script>
@endsection