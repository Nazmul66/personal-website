@extends('admin.layouts.master')

@section('title')
    {{ 'Update Admin' }}
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
                        <h5 class="m-0">Update Admin</h5>
                        <a href="{{ route('admin.admin.index') }}" class="btn btn-primary"> Back</a>
                    </div>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{route('admin.admin.update', $row->id)}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $row->id }}" />
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="image" class="form-lable">User Image
                                    <br><small class="text-info fw-bold"><strong>(Recommended size 150 x
                                            150px)</strong></small>
                                </label>
                                <input type="file" name="image" id="image" class="form-control"
                                    style="height: auto;">

                                <img class="custom-img mt-2" src="@if($row->image)
                                {{ asset($row->image) }}
                                @else
                                    {{ asset('assets/images/default-user.png') }}
                                @endif" alt="{{ $row->name }}" width="120" height="120">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input value="{{$row->name}}" type="text" class="form-control" name="name" placeholder="Name"
                                required="">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                            <input value="{{$row->email}}" type="email" class="form-control" name="email" placeholder="Email"
                                required="" autocomplete="off">
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Role<span class="text-danger">*</span></label>
                            <select class="form-control" name="roles" style="height: auto;" required="">
                                <option value="">Select Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}"
                                        {{ $row->hasRole($role->name) ? 'selected' : '' }}>
                                        {{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="statuss" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-control form-select" name="status" id="statuss" style="height: auto;"
                                required="">
                                <option value="1" {{$row->status == '1' ? 'selected' : '' }} >Active</option>
                                <option value="0" {{$row->status == '0' ? 'selected' : '' }} >Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Update</button>
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
