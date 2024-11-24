<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ date('d-M-Y') }} Invoice </title>
    {{-- <link type="image/x-icon" href="{{ asset('dashboard-assets/images/full-ship-logo.png') }}" rel="shortcut icon"> --}}
    <style>
        body {
            font-family: Roboto;
        }


        .text-end {
            text-align: right !important;
        }

        .row {
            padding: 1rem;
        }

        .col-4 {
            width: 32.5%;
        }

        .col-6 {
            width: 48.5%;
        }

        .col-12 {
            width: 100%;
        }

        .m-0 {
            margin: 0 !important;
        }

        h6,
        .h6 {
            font-size: 1rem;
        }

        h6,
        .h6,
        h5,
        .h5,
        h4,
        .h4,
        h3,
        .h3,
        h2,
        .h2,
        h1,
        .h1 {
            margin-top: 0;
            margin-bottom: 0.5rem;
            font-weight: 500;
            line-height: 1.2;
        }

        .border-top {
            border-top: 1px solid #dee2e6 !important;
        }

        .text-center {
            text-align: center !important;
        }

        .text-end {
            text-align: right !important;
        }

        .my-2 {
            margin-top: 0.5rem !important;
            margin-bottom: 0.5rem !important;
        }
        .invoice_header{

        }
        .logo-center {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 5px;
        }
        .header_right{
            width: 40%;
            float: right;
        }
        .header_left{
            width: 60%;
            float: left;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            vertical-align: top;
            border-color: #dee2e6;
        }
        .fs-6 {
            font-size: 1rem !important;
        }
        .fs-5 {
            font-size: 1.25rem !important;
        }
        table {
            caption-side: bottom;
            border-collapse: collapse;
        }

        .table-bordered th {
            border: 1px solid #ddd;
            padding: 12px;
            font-size: 16px;
            text-align: left;
        }

        .table-bordered td {
            border: 1px solid #ddd;
            padding: 8px 12px;
            font-size: 15px;
        }

        .bg-success {
            background-color: #5cb85c !important;
        }

        .bg-info {
            background-color: #5bc0de !important;
        }

        .p-1 {
            padding: 0.25rem !important;
        }

        .p-2 {
            padding: 0.50rem !important;
        }
        .p-3 {
            padding: 1.00rem !important;
        }
        .p-4 {
            padding: 1.5rem !important;
        }
        .mt-0 {
            margin-top: 0 !important;
        }

        .mt-2 {
            margin-top: 0.5rem !important;
        }
        address {
            font-style: normal;
        }
        .img-fluid {
            max-width: 100%;
            height: auto;
        }
        .text-white {
            color: white !important;
        }

        .mt-4 {
            margin-top: 1.5rem !important;
        }

        .px-4 {
            padding-right: 1.5rem !important;
            padding-left: 1.5rem !important;
        }
        .py-5 {
            padding-top: 3rem !important;
            padding-bottom: 3rem !important;
        }
        .px-2 {
            padding-right: .5rem !important;
            padding-left: .5rem !important;
        }
        .text-dark {
            color: #444343;
            text-decoration: none;
        }
        p {
            margin: 10px 0px !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div style="max-width: 1000px; margin:0 auto;">
            <div class="booking_invoice" style="margin: 0px 0px;">
                <h2 class="pt-5 text-center" style="margin-bottom: 30px; font-size:25px; font-weight:500;">
                   Invoice</h2>
                <div class="invoice_header" style="padding: 10px 0px">
                    <div class="logo-center">
                        <img style="width: 80px;"
                             src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path($setting->site_logo))) }}"
                             class="img-fluid" alt="Logo">
                    </div>
                    <div class="header_left">
                        {{-- <img style="width: 80px;"
                            src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path($setting->site_logo))) }}"
                            class="img-fluid mb-3" alt="Logo"> --}}
                        <address style="padding: 5px 15px;">
                            @if($setting->email)
                            <p><strong>Email :</strong> <a class="text-dark" href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></p>
                            @endif

                            @if($setting->phone_no)
                            <p><strong>Phone :</strong> <a class="text-dark" href="tel:{{ $setting->phone_no }}">{{ $setting->phone_no }}</a></p>
                            @endif

                            @if($setting->address)
                            <p><strong>Address:</strong> {{ $setting->address }}</p>
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
                <div style="margin-top: 120px;">
                    <table class="table table-bordered m-0">
                        <tbody>
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
                            <!-- Payment Status -->
                            <tr>
                                <th>Payment Status</th>
                                <td colspan="2">
                                    @if ($row->payment_status == 'paid')
                                    <span class="text-success">{{$row->payment_status}} By {{$row->payment_method}}</span>
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
                            <tr>
                                <th>Package Exprired Date</th>
                                <td colspan="2">{{ \Carbon\Carbon::parse($row->userPlan->expired_date)->format('d-M-Y') }}</td>
                            </tr>

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
                    <h5 class="text-uppercase fs-6"> Thank you for your purchase with {{$setting->site_name}}!</h5>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
