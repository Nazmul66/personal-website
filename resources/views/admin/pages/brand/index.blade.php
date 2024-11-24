@extends('admin.layouts.master')

@section('title')
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap5-toggle@5.1.1/css/bootstrap5-toggle.min.css" rel="stylesheet">
@endpush

@section('content')
    {{-- Breadcrumb --}}
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0 font-size-18">{{ $title }}</h4>
        <button class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#create_modal">Add
            New</button>
    </div>


    <!-- Create Modal -->
    <div class="modal fade" id="create_modal" tabindex="-1" aria-labelledby="createLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Brand</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.brand.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Brand Name <span class="text-danger">*</span></label>
                            <input name="name" id="name" placeholder="Write Brand Name" type="text"
                                class="form-control" value="{{ old('name') }}">
                        </div>

                        <div class="mb-3">
                            <img src="{{ asset('assets/images/demo-icon.png') }}" class="d-block" alt=""
                                for="up_image" style="width: 75px; height: 75px;">
                            <label for="image" class="form-label">Brand Image <span class="text-danger">* Image
                                    resulation ( 150px X 70px )</span></label>
                            <input id="image" type="file" name="image" class="form-control form-control">
                        </div>

                        <div class="mb-3">
                            <label for="statuss" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-control" name="status" id="statuss">
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
    </div>


    {{-- Tables --}}
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-0 table table-hover" id="datatables">
                    <thead>
                        <tr>
                            <th>#SL.</th>
                            <th>Brand Name</th>
                            <th>Brand Iamge</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($rows as $key => $row)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $row->name }}</td>
                                <td>
                                    <a href="{{ asset($row->image) }}" target="__blank">
                                        <img src="{{ asset($row->image) }}" alt=""
                                            style="width: 120px; height: 120px; object-fit: contain;">
                                    </a>
                                </td>
                                <td>
                                    <input type="checkbox" class="status-toggle" data-id="{{ $row->id }}"
                                    data-toggle="toggle" data-onlabel="Active" data-offlabel="Inactive"
                                    data-onstyle="success" data-offstyle="danger"  {{ $row->status == 1 ? 'checked' : '' }} >
                                    {{-- @if ($row->status == 1)
                                        <span class="text-success">Active</span>
                                    @else
                                        <span class="text-danger">Inactive</span>
                                    @endif --}}
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary waves-effect waves-light dropdown-toggle"
                                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <button class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#view_modal{{ $row->id }}"
                                                    style="font-size: 16px;"><i
                                                        class="fas fa-eye"></i> View</button>
                                            </li>
                                            <li>
                                                <button class="dropdown-item" style="font-size: 16px;"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#edit_modal{{ $row->id }}"><i
                                                        class='bx bxs-edit text-info'></i>
                                                    Edit</button>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('admin.brand.delete', $row->id) }}"
                                                    style="font-size: 16px;" id="deleteData"><i
                                                        class='bx bxs-trash text-danger'></i> Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="edit_modal{{ $row->id }}" tabindex="-1"
                                aria-labelledby="edit_lLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Brand</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('admin.brand.update', $row->id) }}"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <div class="mb-3">
                                                    <label for="up_name" class="form-label">Brand Name <span
                                                            class="text-danger">*</span></label>
                                                    <input name="name" id="up_name" placeholder="Write Brand Name"
                                                        type="text" class="form-control" value="{{ $row->name }}">
                                                </div>

                                                <div class="mb-3">
                                                    <img src="{{ asset($row->image) }}" class="d-block" alt=""
                                                        <label for="up_image" style="width: 75px; height: 75px;">
                                                    <label class="form-label">Brand Image <span class="text-danger">*
                                                            Recommendation ( 120px X 120px )</span></label>
                                                    <input id="up_image" type="file" name="image"
                                                        class="form-control form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="up_status" class="form-label">Status <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-control" name="status" id="up_status">
                                                        <option selected="" value="1"
                                                            @if ($row->status == 1) selected @endif>Active
                                                        </option>
                                                        <option value="0"
                                                            @if ($row->status == 0) selected @endif>Inactive
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="order_id" class="form-label">Order Id </label>
                                                    <input name="order_id" id="order_id" placeholder="Order Id Number"
                                                        type="number" class="form-control"
                                                        value="{{ $row->order_id }}">
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger waves-effect waves-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit"
                                                        class="btn btn-primary waves-effect waves-light">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- View Modal -->
                            <div class="modal fade" id="view_modal{{ $row->id }}" tabindex="-1"
                                aria-labelledby="edit_lLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">View Brand List</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="view_modal_content">
                                                <label>Brand Name : </label>
                                                <span class="text-dark">{{ $row->name }}</span>
                                            </div>

                                            <div class="view_modal_content">
                                                <label>Brand Image : </label>
                                                <a href="{{ asset($row->image) }}" target="__blank">
                                                    <img src="{{ asset($row->image) }}" alt=""
                                                        style="width: 100px;">
                                                </a>
                                            </div>

                                            <div class="view_modal_content">
                                                <label>Status : </label>
                                                @if ($row->status == 1)
                                                    <span class="text-success">Active</span>
                                                @else
                                                    <span class="text-danger">Inactive</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{-- <tr>
                            <th scope="row">2</th>
                            <td>ebay</td>
                            <td>
                                <a href="{{ asset('adminpanel/images/ebay.png') }}" target="__blank">
                                    <img src="{{ asset('adminpanel/images/ebay.png') }}" alt=""
                                        style="width: 120px; height: 120px;">
                                </a>
                            </td>
                            <td>
                                <span class="text-danger">Inactive</span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary waves-effect waves-light dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#view_modal"
                                                style="font-size: 16px;"><i class="fas fa-eye"></i> View</button>
                                        </li>
                                        <li>
                                            <button class="dropdown-item" style="font-size: 16px;" data-bs-toggle="modal"
                                                data-bs-target="#edit_modal"><i class='bx bxs-edit text-info'></i>
                                                Edit</button>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" style="font-size: 16px;"
                                                id="deleteData"><i
                                                    class='bx bxs-trash text-danger'></i> Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">3</th>
                            <td>Microsoft</td>
                            <td>
                                <a href="{{ asset('adminpanel/images/microsoft.png') }}" target="__blank">
                                    <img src="{{ asset('adminpanel/images/microsoft.png') }}" alt=""
                                        style="width: 120px; height: 120px;">
                                </a>
                            </td>
                            <td>
                                <span class="text-danger">Inactive</span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary waves-effect waves-light dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#view_modal"
                                                style="font-size: 16px;"><i class="fas fa-eye"></i> View</button>
                                        </li>
                                        <li>
                                            <button class="dropdown-item" style="font-size: 16px;" data-bs-toggle="modal"
                                                data-bs-target="#edit_modal"><i class='bx bxs-edit text-info'></i>
                                                Edit</button>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" style="font-size: 16px;"
                                                id="deleteData"><i
                                                    class='bx bxs-trash text-danger'></i> Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap5-toggle@5.1.1/js/bootstrap5-toggle.ecmas.min.js"></script>

    <script>
        let table = new DataTable('#datatables', {
            responsive: true
        });

        $(document).ready(function () {
            $('.status-toggle').change(function () {
                let isChecked = $(this).prop('checked') ? 1 : 0;
                let rowId = $(this).data('id');
                console.log(rowId);


                $.ajax({
                    url: "{{ route('admin.brand.toggleStatus') }}",
                    type: "POST",
                    data: {
                        id: rowId,
                        status: isChecked,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        toastr.success(response.message);
                    },
                    error: function () {
                        toastr.error('An error occurred while updating the status.');
                    }
                });
            });
        });
    </script>
@endpush
