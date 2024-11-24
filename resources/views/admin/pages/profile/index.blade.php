@extends('admin.layouts.master')

@section('title')
    {{-- {{ $title }} --}}
@endsection

@php
    $user = Auth::user();
@endphp

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <style>
        .card-info.card-outline {
            border-top: 3px solid #17a2b8;
        }

        .img-circle {
            border-radius: 50%;
        }

        .profile-user-img {
            border: 3px solid #adb5bd;
            margin: 0 auto;
            padding: 3px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }

        .list-group-item {
            display: flex !important;
            justify-content: space-between !important;
            align-items: center !important;
            border-left: none !important;
            border-right: none !important;
        }

        .card_shadow {
            box-shadow: 0px 0px 16px rgba(0, 0, 0, 0.2);
        }

        ul .list-group-item a {
            font-weight: 500 !important;
        }
    </style>
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4 card card-info card-outline card_shadow">
                    <div class="card-body box-profile position-relative">
                        <a href="{{ route('admin.profiles.profile_edit') }}" class="position-absolute"
                            style="right: 0; top: 5px; font-size: 28px;" title="Edit">
                            <i class='bx bx-edit-alt'></i>
                        </a>
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset($user->image) }}"
                                alt="Super Admin">
                        </div>

                        <ul class="list-group list-group-unbordered mb-3 mt-3">
                            <li class="list-group-item border-top-0">
                                <b>Name</b> <a class="float-right">{{ $user->name }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a href="mailto: {{ $user->email }}"
                                    class="float-right">{{ $user->email }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Role</b> <a class="float-right">
                                    @foreach ($roles as $role)
                                        {{ $user->hasRole($role->name) ? ucfirst($role->name) : '' }}
                                    @endforeach
                                </a>
                            </li>
                            @if (!empty($user->created_at))
                                <li class="list-group-item">
                                    <b>Join At</b> <a
                                        class="float-right">{{ date('d M, Y', strtotime($user->created_at)) }}</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
