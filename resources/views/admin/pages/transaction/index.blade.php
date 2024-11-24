@extends('admin.layouts.master')

@section('title')
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <style>
        canvas {
            margin: 0 auto;
            max-width: 600px;
            max-height: 300px;
        }
    </style>

@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="">
                <h2>Transaction Statistics</h2>

                <!-- Loading Indicator -->
                <div id="loading" style="display: none;">Loading...</div>
                <!-- Charts -->
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <canvas id="barChart" width="500" height="300"></canvas>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <canvas id="pieChart" width="500" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0 font-size-18">{{ $title }}</h4>
    </div>

    {{-- Tables --}}
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-0 table table-hover" id="datatables">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Transaction ID</th>
                            <th>User Name</th>
                            <th>Plan Name</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Payment Method</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($transactions as $key => $transaction)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $transaction->transaction_id }}</td>
                                <td>{{ $transaction->user->name }} {{ $transaction->user->last_name }}</td>
                                <td>{{$transaction->plan->title ?? 'N/A' }}</td>
                                <td>${{ number_format($transaction->amount, 2) }}</td>
                                <td>
                                    @if ($transaction->payment_status == 'paid')
                                    <span class="text-success">{{$transaction->payment_status}}</span>
                                    @elseif ($transaction->payment_status == 'cancel')
                                    <span class="text-danger">Cancel and Refunded</span>
                                    @else
                                    <span class="text-warning">{{$transaction->payment_status}}</span>
                                    @endif
                                </td>
                                <td>{{ ucfirst($transaction->payment_method) }}</td>
                                <td>{{ $transaction->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary waves-effect waves-light dropdown-toggle"
                                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{route('admin.transaction.invoice', $transaction->id)}}" class="dropdown-item">
                                                    <i class="fas fa-eye"></i> View
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('admin.transaction.order.cancel', $transaction->id)}}" id="cancelbtn" class="dropdown-item text-danger">
                                                    <i class="fas fa-window-close"></i> Cancel Transaction
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        let table = new DataTable('#datatables', {
            responsive: true
        });

        $(document).ready(function () {
        const barChartElement = document.getElementById('barChart').getContext('2d');
        const pieChartElement = document.getElementById('pieChart').getContext('2d');
        let barChart, pieChart;

        const fetchTransactionStats = (filter = 'current_month') => {
            $('#loading').show();
            $.ajax({
                url: '{{ route('admin.transaction.getTransactionStatistics') }}',
                method: 'GET',
                data: { filter: filter },
                success: function (data) {
                    $('#loading').hide();
                    updateGraphs(data);
                },
                error: function (error) {
                    $('#loading').hide();
                    console.error('Error fetching transaction stats:', error);
                    alert('Failed to fetch transaction data.');
                }
            });
        };

        const updateGraphs = (data) => {
            if (!data) return;

            updateBarChart(data);
            updatePieChart(data);
        };

        // const updateBarChart = (data) => {
        //     if (barChart) barChart.destroy(); // Destroy previous chart instance
        //     barChart = new Chart(barChartElement, {
        //         type: 'bar',
        //         data: {
        //             labels: [
        //                 'January', 'February', 'March', 'April', 'May', 'June',
        //                 'July', 'August', 'September', 'October', 'November', 'December'
        //             ],
        //             datasets: [{
        //                 label: 'Transaction Volume',
        //                 data: [
        //                     data.months[1], data.months[2], data.months[3], data.months[4],
        //                     data.months[5], data.months[6], data.months[7], data.months[8],
        //                     data.months[9], data.months[10], data.months[11], data.months[12]
        //                 ],
        //                 backgroundColor: '#4caf50',
        //             }]
        //         },
        //         options: {
        //             responsive: true,
        //             plugins: {
        //                 title: { display: true, text: 'Transaction Volume by Month' }
        //             },
        //             scales: { y: { beginAtZero: true } }
        //         }
        //     });
        // };


        // const updatePieChart = (data) => {
        //     if (pieChart) pieChart.destroy(); // Destroy previous chart instance
        //     pieChart = new Chart(pieChartElement, {
        //         type: 'pie',
        //         data: {
        //             labels: ['Current Month', 'Last Month', 'This Year'],
        //             datasets: [{
        //                 data: [data.current_month.total, data.last_month.total, data.yearly.total],
        //                 backgroundColor: ['#f44336', '#3f51b5', '#8bc34a'],
        //             }]
        //         },
        //         options: {
        //             responsive: true,
        //             plugins: {
        //                 title: { display: true, text: 'Transaction Distribution' }
        //             }
        //         }
        //     });
        // };

        const updateBarChart = (data) => {
            if (barChart) barChart.destroy(); // Destroy previous chart instance

            // Array of month names
            const monthNames = [
                'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
                'September', 'October', 'November', 'December'
            ];

            // Prepare the labels for the months (e.g., "January", "February", etc.)
            const monthLabels = Object.keys(data.months).map(month => monthNames[month - 1]);

            barChart = new Chart(barChartElement, {
                type: 'bar',
                data: {
                    labels: monthLabels,  // Use month names here
                    datasets: [{
                        label: 'Transaction Amount',
                        data: Object.values(data.months),  // Use transaction data here
                        backgroundColor: '#8bc34a',
                        borderColor: '#4caf50',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        };

        const updatePieChart = (data) => {
            if (pieChart) pieChart.destroy(); // Destroy previous chart instance

            pieChart = new Chart(pieChartElement, {
                type: 'pie',
                data: {
                    labels: ['Current Month', 'Last Month', 'This Year'],
                    datasets: [{
                        data: [data.current_month, data.last_month, data.yearly],
                        backgroundColor: ['#f44336', '#3f51b5', '#8bc34a'],
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: { display: true, text: 'Transaction Distribution' }
                    }
                }
            });
        };


        // Fetch initial data and listen for filter changes
        fetchTransactionStats();
        // $('#dateFilter').change(function () {
        //     const filter = $(this).val();
        //     fetchTransactionStats(filter);
        // });
    });

    </script>
@endpush
