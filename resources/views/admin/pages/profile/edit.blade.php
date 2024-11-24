@extends('admin.layouts.master')

@section('title')
    {{-- {{ $title }} --}}
@endsection

@php
    $user = Auth::user();
@endphp

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h4 class="card-title text-white">Profile Update</h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.profiles.profile.update') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-grou">
                                    <label for="" class="form-label">Profile Image
                                        <br><small class="text-info fw-bold"><strong>(Recommended size
                                                150x150px)</strong></small>
                                    </label>
                                    <input type="file" name="image" class="form-control">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{ $user->name ?? old('name') }}"
                                        class="form-control" required="">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="" class="form-label">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" name="email" value="{{ $user->email ?? old('email') }}"
                                        class="form-control" required="">
                                </div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h4 class="card-title text-white">Change Password</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.profiles.password.update') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="" class="form-label">New Password <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group input-group-flat">
                                        <input type="password" name="password" id="password-field" value=""
                                            class="form-control" required="">
                                        <span class="input-group-text px-3">
                                            <a href="javascript:void(0)"
                                                class="bg-transparent border-0 p-0 link-secondary  fa fa-fw fa-eye field-icon toggle-password"
                                                toggle="#password-field">
                                            </a>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="" class="form-label">Confirm New Password <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group input-group-flat">
                                        <input type="password" name="confirm_password" id="confirm_password" value=""
                                            class="form-control" required="">
                                        <span class="input-group-text px-3">
                                            <a href="javascript:void(0)"
                                                class="bg-transparent border-0 p-0 link-secondary fa fa-fw fa-eye field-icon confirm-toggle-password"
                                                toggle="#confirm_password">
                                            </a>
                                        </span>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light mt-3">Change
                                    Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {

            // password show hide
            $(".toggle-password").click(function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });

            $(".confirm-toggle-password").click(function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });

        })
    </script>
@endpush
