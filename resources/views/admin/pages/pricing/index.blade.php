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
        <a href="{{ route('admin.pricing.create') }}" class="btn btn-primary waves-effect waves-light">Add New</a>
    </div>


    {{-- Tables --}}
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-0 table table-hover" id="datatables">
                    <thead>
                        <tr>
                            <th>#SL.</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Pricing Type</th>
                            <th>Duration</th>
                            <th>Order Number</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($plans as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{$item->title}}</td>
                            <td>$ {{ $item->price }}</td>
                            <td>
                                @if ($item->frequency == '1')
                                    Monthly
                                @else
                                    Year
                                @endif
                            </td>
                            <td>{{$item->duration}} Days</td>
                            <td>
                                {{$item->order_number}}
                            </td>
                            <td>
                                <input type="checkbox" class="status-toggle" data-id="{{ $item->id }}"
                                data-toggle="toggle" data-onlabel="Active" data-offlabel="Inactive"
                                data-onstyle="success" data-offstyle="danger"  {{ $item->status == 1 ? 'checked' : '' }} >
                                {{-- @if ($item->status == '1')
                                    <span class="text-success">Active</span>
                                @else
                                    <span class="text-success">Inactive</span>
                                @endif --}}
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary waves-effect waves-light dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('admin.pricing.duplicate', $item->id) }}" class="dropdown-item" style="font-size: 16px;">
                                                <i class='bx bx-copy text-warning'></i> Duplicate
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('admin.pricing.view', $item->id)}}" class="dropdown-item" style="font-size: 16px;"><i
                                                class='fas fa-eye text-info'></i> View</a>
                                        </li>
                                        <li>
                                            <a href="{{route('admin.pricing.edit', $item->id)}}" class="dropdown-item" style="font-size: 16px;"><i
                                                    class='bx bxs-edit text-info'></i> Edit</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{route('admin.pricing.delete', $item->id)}}" style="font-size: 16px;"
                                                id="deleteData"><i
                                                    class='bx bxs-trash text-danger'></i> Delete</a>
                                        </li>
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


    <!-- View Modal -->
    <div class="modal fade" id="view_modal" tabindex="-1" aria-labelledby="edit_lLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">View Pricing Package List</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="view_modal_content">
                        <label>Title : </label>
                        <span class="text-dark">Business.</span>
                    </div>

                    <div class="view_modal_content">
                        <label>Price : </label>
                        <span class="text-dark">$50</span>
                    </div>

                    <div class="view_modal_content">
                        <label>Duration : </label>
                        <span class="text-dark">USD Per Month</span>
                    </div>

                    <div class="view_modal_content">
                        <label>Word Number : </label>
                        <span class="text-dark">80000</span>
                    </div>

                    <div class="view_modal_content">
                        <label>Template : </label>
                        <span class="text-dark">6+</span>
                    </div>

                    <div class="view_modal_content">
                        <label>Language : </label>
                        <span class="text-dark">5+</span>
                    </div>

                    <div class="view_modal_content">
                        <label>AI Blog Generate : </label>
                        <span class="text-success">Yes</span>
                    </div>

                    <div class="view_modal_content">
                        <label>Advance Editor Tool : </label>
                        <span class="text-danger">No</span>
                    </div>

                    <div class="view_modal_content">
                        <label>Consistent Support : </label>
                        <span class="text-success">Yes</span>
                    </div>

                    <div class="view_modal_content">
                        <label>Status : </label>
                        <span class="text-success">Active</span>
                    </div>
                </div>
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
                    url: "{{ route('admin.pricing.toggleStatus') }}",
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
