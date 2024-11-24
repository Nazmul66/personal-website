@extends('admin.layouts.master')

@section('title')
    {{ $data['title'] }}
@endsection

@section('customer', 'mm-active')

@push('css')
@endpush

@php
    $user = $data['user'];
@endphp

@section('content')
    {{-- Breadcrumb --}}
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0 font-size-18">{{ $data['title'] }}</h4>
        <a href="{{ route('admin.customer.index') }}" class="btn btn-primary waves-effect waves-light">Back</a>
    </div>
    {{-- Body --}}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">

                    <form action="{{ route('admin.customer.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="name" class="form-label">First Name <span class="text-danger">*</span></label>
                                    <input name="name" id="name" placeholder="First Name...."
                                           type="text" class="form-control" value="{{ old('name', $user->name) }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name </label>
                                    <input name="last_name" id="last_name" placeholder="Last Name...."
                                           type="text" class="form-control" value="{{ old('last_name', $user->last_name) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="username" class="form-label">User Name </label>
                                    <input name="username" id="username" placeholder="User name...."
                                           type="text" class="form-control" value="{{ old('username', $user->username) }}"  readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input name="email" id="email" placeholder="User email...."
                                           type="email" class="form-control" value="{{ old('email', $user->email) }}"  required>
                                </div>
                            </div>
                        <div>
                            <button type="submit" class="btn btn-info waves-effect waves-light w-md">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @push('script')


    @endpush
