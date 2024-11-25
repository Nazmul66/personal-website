@extends('admin.layouts.master')

@section('title')
    {{ 'All Admin List' }}
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">All Admin List</h3>
                        <div class="float-right">
                            <a href="{{ route('admin.admin.create') }}" class="btn btn-primary">Add
                                New</a>
                        </div>
                    </div>
                </div>

                <div class="p-2">
                    <div class="card-body table-responsive p-0">
                        <table id="dataTables" class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">SN</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Status</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th width="5%">SN</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Status</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @forelse ($rows as $key=> $row)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>
                                            @if($row->status == 1)
                                                <span class="text-success">Active</span>
                                            @else
                                                <span class="text-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary waves-effect waves-light dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu">
                                                    {{-- <li>
                                                        <button class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#view_modal" style="font-size: 16px;"><i
                                                                class="fas fa-eye"></i> View</button>
                                                    </li> --}}
                                                    <li>
                                                        <a href="{{route('admin.admin.edit', $row->id)}}" class="dropdown-item" style="font-size: 16px;"><i
                                                                class="bx bxs-edit text-info"></i> Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="" class="dropdown-item" style="font-size: 16px;"  data-bs-toggle="modal" data-bs-target="#passwordChangeModal{{ $row->id }}">
                                                            <i class='bx bxs-key'></i> Password Change</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('admin.admin.viewSession', $row->id)}}" class="dropdown-item"
                                                            style="font-size: 16px;"><i class='bx bxs-info-circle' ></i> Session History</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>


                                      <!-- Password Change Modal for Each User -->
                                    <div class="modal fade" id="passwordChangeModal{{ $row->id }}" tabindex="-1" aria-labelledby="passwordChangeModalLabel{{ $row->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="passwordChangeModalLabel{{ $row->id }}">Change Password for {{ $row->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('admin.admin.password.update', $row->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
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
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <td colspan="4">User not found!</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- View Modal -->
    <div class="modal fade" id="view_modal" tabindex="-1" aria-labelledby="edit_lLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">View Admins List</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="view_modal_content">
                        <label>Name : </label>
                        <span class="text-dark">Alen Clark</span>
                    </div>

                    <div class="view_modal_content">
                        <label>Email : </label>
                        <a href="mailto: alen45@gmail.com" class="text-info">alen45@gmail.com</a>
                    </div>

                    <div class="view_modal_content">
                        <label>Role : </label>
                        <span class="text-dark">Super Admin</span>
                    </div>

                    <div class="view_modal_content">
                        <label>Status : </label>
                        <span class="text-danger">Inactive</span>
                    </div>
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
        });
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
