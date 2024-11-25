@extends('admin.layouts.master')

@section('title')
    {{ 'Admin Create' }}
@endsection

@section('admin-role', 'mm-active')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="m-0">Admin Create</h5>
                        <a href="{{ route('admin.admin.index') }}" class="btn btn-primary"> Back</a>
                    </div>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{route('admin.admin.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="image" class="form-lable">User Image
                                    <br><small class="text-info fw-bold"><strong>(Recommended size 150 x
                                            150px)</strong></small>
                                </label>
                                <input type="file" name="image" id="image" class="form-control"
                                    style="height: auto;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input value="" type="text" class="form-control" name="name" placeholder="Name"
                                required="">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                            <input value="" type="email" class="form-control" name="email" placeholder="Email"
                                required="" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Password <span class="text-danger">*</span></label>
                            <div class="input-group input-group-flat">
                                <input type="password" name="password" id="password-field" value=""
                                    class="form-control" required="" autocomplete="off">
                                <span class="input-group-text px-3">
                                    <a href="javascript:void(0)"
                                        class="link-secondary fa fa-fw fa-eye field-icon toggle-password"
                                        toggle="#password-field">
                                    </a>
                                </span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="statuss" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-control form-select" name="status" id="statuss" style="height: auto;"
                                required="">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTables').DataTable();

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
        });
    </script>
@endpush
