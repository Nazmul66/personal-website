@extends('admin.layouts.master')

@section('title')
    {{ $title }}
@endsection
@section('customer', 'mm-active')


@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
@endpush

@section('content')
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0 font-size-18">{{ $title }} of {{$rows->name}} {{$rows?->last_name}}({{$rows->username}})</h4>
        <a href="{{ route('admin.customer.index') }}" class="btn btn-primary waves-effect waves-light">Back</a>
    </div>

    {{-- Tables --}}
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Session History</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Login Time</th>
                        <th>Logout Time</th>
                        <th>Total Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rows->sessionHistories as $key => $history)
                        @php
                            // Calculate the total time spent in the session
                            $loginTime = \Carbon\Carbon::parse($history->login_time);
                            $logoutTime = $history->logout_time ? \Carbon\Carbon::parse($history->logout_time) : \Carbon\Carbon::now();
                            $totalTime = $loginTime->diffForHumans($logoutTime, true);
                        @endphp
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $loginTime->format('d M Y H:i') }}</td>
                            <td>
                                @if ($history->logout_time)
                                    {{ $logoutTime->format('d M Y H:i') }}
                                @else
                                    Still logged in
                                @endif
                            </td>
                            <td>{{ $totalTime }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@push('script')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    <script>
        let table = new DataTable('#datatables', {
            responsive: true
        });
    </script>
@endpush
