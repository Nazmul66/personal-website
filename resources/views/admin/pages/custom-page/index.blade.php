@extends('admin.layouts.master')

@section('title')
    {{ 'Manage All Pages' }}
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap5-toggle@5.1.1/css/bootstrap5-toggle.min.css" rel="stylesheet">
    <style>

    </style>
@endpush

@section('content')
    {{-- Breadcrumb --}}
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0 font-size-18">Manage All Pages</h4>
        <a href="{{ route('admin.cpage.create') }}" class="btn btn-primary waves-effect waves-light">Add New</a>
    </div>


    {{-- <!-- Create Modal -->
    <div class="modal fade" id="create_modal" tabindex="-1" aria-labelledby="createLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Page</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class='bx bx-x text-white' style="font-size: 28px;"></i></button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.cpage.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Page Name <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" placeholder="Write Your Title...."
                                class="form-control" value="{{ old('title') }}">
                        </div>

                        <div class="mb-3">
                            <label for="is_active" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-control" name="is_active" id="is_active">
                                <option selected="" value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger waves-effect waves-light"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div> --}}


    {{-- Tables --}}
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-0 table table-hover" id="datatables">
                    <thead>
                        <tr>
                            <th>#SL.</th>
                            <th>Page Name</th>
                            <th>Status</th>
                            {{-- <th>Order Id</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($rows as $key => $row)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>

                                <td>{{ $row->title }}</td>

                                <td>
                                    <input type="checkbox" class="status-toggle" data-id="{{ $row->id }}"
                                        data-toggle="toggle" data-onlabel="Active" data-offlabel="Inactive"
                                        data-onstyle="success" data-offstyle="danger"
                                        {{ $row->is_active == 1 ? 'checked' : '' }}>
                                    {{-- @if ($row->is_active == 1)
                                        <span class="text-success">Active</span>
                                    @else
                                        <span class="text-danger">Inactive</span>
                                    @endif --}}
                                </td>

                                {{-- <td>{{ $row->order_id }}</td> --}}

                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary waves-effect waves-light dropdown-toggle"
                                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{ route('admin.cpage.view', $row->id) }}" class="dropdown-item"
                                                    style="font-size: 16px;"><i class="fas fa-eye"></i> View</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin.cpage.edit', $row->id) }}" class="dropdown-item"
                                                    style="font-size: 16px;"><i class='bx bxs-edit text-info'></i> Edit</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('customPage', $row->url_slug) }}" target="_blank"
                                                    class="dropdown-item" style="font-size: 16px;"><i
                                                        class="fas fa-eye"></i> View Page</a>
                                            </li>
                                            {{-- <li>
                                                <a class="dropdown-item" href="{{ route('admin.cpage.delete', $row->id) }}"
                                                    style="font-size: 16px;" id="deleteData"><i
                                                        class='bx bxs-trash text-danger'></i> Delete</a>
                                            </li> --}}
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    {{-- </div> --}}
@endsection

@push('script')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap5-toggle@5.1.1/js/bootstrap5-toggle.ecmas.min.js"></script>
    <script>
        let table = new DataTable('#datatables', {
            responsive: true
        });

        $(document).ready(function() {
            $('.status-toggle').change(function() {
                let isChecked = $(this).prop('checked') ? 1 : 0;
                let rowId = $(this).data('id');
                console.log(rowId);


                $.ajax({
                    url: "{{ route('admin.cpage.toggleStatus') }}",
                    type: "POST",
                    data: {
                        id: rowId,
                        is_active: isChecked,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        toastr.success(response.message);
                    },
                    error: function() {
                        toastr.error('An error occurred while updating the status.');
                    }
                });
            });
        });
    </script>
@endpush
