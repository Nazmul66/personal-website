@extends('layout.layout1')
@section('transcations', 'active')

@php
    $headTitle = 'Purchase History';
    $header = 'header';
@endphp

@section('content')
    <!-- Main content -->
    <div class="rbt-main-content mr--0 mb--0">
        <div class="rbt-daynamic-page-content center-width">

            <!-- Dashboard Center Content -->
            <div class="rbt-dashboard-content">
                <div class="banner-area">
                    <!-- ChatenAI small Slider -->
                    <div class="settings-area">
                        <h3 class="title">Purchase History</h3>
                        <ul class="user-nav">
                            <li>
                                <a href="{{ route('user.dashboard.profileDetails') }}">
                                    <span>Profile Details</span>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="{{ route('notification') }}">
                                    <span>Notification</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('chatExport') }}">
                                    <span>Chat Export</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('appearance') }}">
                                    <span>Apperance</span>
                                </a>
                            </li> --}}
                            <li>
                                <a href="{{ route('user.dashboard.plansBilling') }}">
                                    <span>Plans and Billing</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('user.dashboard.transactions')}}" class="@yield('transactions')">
                                    <span>Purchase History</span>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="{{ route('sessions') }}">
                                    <span>Sessions</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('application') }}">
                                    <span>Application</span>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </div>

                <div class="content-page pb--50">
                    <div class="container">
                        <h3 class="mt-4">Transaction History</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Transaction ID</th>
                                        <th scope="col">Plan Name</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Payment Method</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-dark-body">
                                    @foreach($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction->transaction_id }}</td>
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
                                                <a href="{{route('user.dashboard.viewInvoice', $transaction->transaction_id)}}" class="btn btn-success">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
