@extends('layout.layout1')
@section('transactions', 'active')


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
                    <div class="shadow-sm rounded" style="max-width: 1000px; margin:0 auto;">
                        <div class="dashboard_header p-3 border-bottom">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="">
                                    <h4 class="title">Pricing Purchase Confirmation</h4>
                                </div>
                                <div class="">
                                    <a href="{{route('user.dashboard.invoiceDownload', $row->transaction_id)}}" class="btn btn-primary py-2 px-3">Download
                                        <i class="fa fa-download"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="booking_invoice overflow-hidden">
                            <h2 class="pt-5 text-center" style="margin-bottom: 30px; font-size:25px; font-weight:500;">
                                Pricing Purchase</h2>
                            <div class="invoice_header p-4">
                                <div class="header_left">
                                    <img src="{{ asset(getSetting()->site_logo) }}" width="100" class="img-fluid mb-1" alt="Logo">
                                    <address>
                                        @if($setting->support_email)
                                        <p class="m-0"><strong>Email :</strong> <a class="" href="mailto:{{$setting->support_email}} ">{{$setting->support_email}} </a></p>
                                        @endif

                                        @if($setting->phone_no)
                                        <p class="m-0"><strong>Phone :</strong> <a class="" href="tel: {{$setting->phone_no}} "> {{$setting->phone_no}} </a></p>
                                        @endif

                                        @if($setting->address)
                                        <p class="m-0"><strong>Address:</strong>  {{$setting->address}} </p>
                                        @endif
                                    </address>
                                </div>
                                <div class="header_right">
                                    <h4 class="mb-3 fs-5"><strong>Customer Informations</strong></h4>
                                    <address>
                                        @if($row->transaction_id)
                                        <p class="m-0"><strong>Transaction Number :</strong> {{ $row->transaction_id}} </p>
                                        @endif
                                        @if($row->user?->name)
                                        <p class="m-0"><strong>Name :</strong> {{$row->user?->name.' '.$row->user?->last_name}}</p>
                                        @endif
                                        @if($row->user?->email)
                                        <p class="m-0"><strong>Email :</strong> <a class="" href="mailto: {{$row->user?->email}} ">{{$row->user?->email}} </a></p>
                                        @endif
                                        @if($row->user?->phone)
                                        <p class="m-0"><strong>Phone :</strong> <a class="" href="tel: {{$row->user?->phone}} ">{{$row->user?->phone}} </a></p>
                                        @endif
                                    </address>
                                </div>
                            </div>
                            <div class="px-4">
                                <table class="table table-striped m-0">
                                    <tbody class="table-dark-body">
                                        <tr>
                                            <th>Plan Name</th>
                                            <td colspan="2">{{ $row->plan->title ?? 'N/A' }}</td>
                                        </tr>

                                        <tr>
                                            <th>Price</th>
                                            <td colspan="2">${{ number_format($row->amount, 2) }}</td>
                                        </tr>

                                        <!-- Plan Duration -->
                                        <tr>
                                            <th>Duration</th>
                                            <td colspan="2">
                                                {{ $row->plan->duration }} Days ({{ $row->plan->frequency == 1 ? 'Monthly' : 'Year(s)' }})
                                            </td>
                                        </tr>
                                        <!-- Total Amount -->
                                        {{-- <tr>
                                            <th>Total Amount</th>
                                            <td colspan="2">${{ number_format($row->transaction?->amount, 2) }}</td>
                                        </tr> --}}

                                        <!-- Payment Status -->
                                        <tr>
                                            <th>Payment Status</th>
                                            <td colspan="2">
                                                @if ($row->payment_status == 'paid')
                                                    <span class="text-success">{{$row->payment_status}} By {{$row->payment_method}}</span>
                                                @elseif ($row->payment_status == 'cancel')
                                                    <span class="text-danger">Cancel and Refunded</span>
                                                @else
                                                    <span class="text-danger">{{$row->payment_status}}</span>
                                                @endif
                                            </td>
                                        </tr>

                                        <!-- Booking Date -->
                                        <tr>
                                            <th>Purchase Date</th>
                                            <td colspan="2">{{ \Carbon\Carbon::parse($row->created_at)->format('d-M-Y') }}</td>
                                        </tr>

                                        <!-- Package Required Date -->
                                        @if ($row->userPlan)
                                        <tr>
                                            <th>Package Exprired Date</th>
                                            <td colspan="2">{{ \Carbon\Carbon::parse($row->userPlan->expired_date)->format('d-M-Y') }}</td>
                                        </tr>
                                        @endif

                                        <!-- Plan Features -->
                                        <tr>
                                            <th>Features</th>
                                            <td colspan="2">
                                                <ul class="list-unstyled">
                                                    @forelse ($row->plan->features as $feature)
                                                        <li> {{ $feature->feature_name }}</li>
                                                    @empty
                                                        <li> No additional features</li>
                                                    @endforelse
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center py-5 px-2">
                                <h5 class="text-uppercase fs-6"> Thank you for your purchase with {{$setting->site_name}}! </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
