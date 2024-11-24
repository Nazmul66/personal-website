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
    </div>


    {{-- Tables --}}
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-0 table table-hover" id="datatables">
                    <thead>
                        <tr>
                            <th>#SL.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($rows as $key => $row)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>
                                    <span style="white-space: nowrap;">
                                        {{ $row->name }}
                                    </span>
                                </td>
                                <td>
                                    <a href="mailto:{{ $row->email }}">{{ $row->name }}</a>
                                </td>
                                <td>
                                    <a href="tel:{{ $row->phone }}" style="white-space: nowrap;">{{ $row->phone }}</a>
                                </td>
                                <td>
                                    <span class="text-dark">{{ $row->subject }}</span>
                                </td>
                                <td>
                                    <span class="text-dark">{{ $row->message }}</span>
                                </td>
                                <td>
                                    <span class="text-dark"
                                        style="white-space: nowrap;">{{ date('Y-m-d', strtotime($row->created_at)) }}</span>
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
                                        <button class="btn btn-primary waves-effect waves-light dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <button class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#view_modal{{ $row->id }}" style="font-size: 16px;"><i
                                                        class="fas fa-eye"></i> View</button>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('admin.contact.delete', $row->id) }}"
                                                    style="font-size: 16px;" id="deleteData"><i
                                                        class='bx bxs-trash text-danger'></i> Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <!-- View Modal -->
                            <div class="modal fade" id="view_modal{{ $row->id }}" tabindex="-1"
                                aria-labelledby="edit_lLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">View Contact List</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="view_modal_content">
                                                <label>Name : </label>
                                                <span class="text-dark">{{ $row->name }}</span>
                                            </div>

                                            <div class="view_modal_content">
                                                <label>Email : </label>
                                                <a href="mailto:{{ $row->email }}" class="text-info">{{ $row->email }}</a>
                                            </div>

                                            <div class="view_modal_content">
                                                <label>Phone : </label>
                                                <a href="tel:{{ $row->phone }}" class="text-info">{{ $row->phone }}</a>
                                            </div>

                                            <div class="message_content">
                                                <label>Subject : </label>
                                                <span class="text-dark">{{ $row->subject }}</span>
                                            </div>

                                            <div class="message_content">
                                                <label>Message : </label>
                                                <span class="text-dark">{{ $row->message }}</span>
                                            </div>

                                            <div class="view_modal_content">
                                                <label>Date : </label>
                                                <span class="text-dark">{{ date('Y-m-d', strtotime($row->created_at)) }}</span>
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
                            <td>
                                <span style="white-space: nowrap;">
                                    Daniel Martinez
                                </span>
                            </td>
                            <td>
                                <a href="mailto:daniel.martinez@example.com">daniel.martinez@example.com</a>
                            </td>
                            <td>
                                <a href="tel:(347) 555-0734" style="white-space: nowrap;">(347) 555-0734</a>
                            </td>
                            <td>
                                <span class="text-dark">"Exclusive Deal Just for You - Don’t Miss Out!"</span>
                            </td>
                            <td>
                                <span class="text-dark">I recently came across your work, and I’m impressed by what your team
                                    does! I’d love to explore ways our organizations can collaborate on upcoming projects.
                                    Please let me know a convenient time for a call to discuss this further.</span>
                            </td>
                            <td>
                                <span class="text-dark" style="white-space: nowrap;">2024-11-12</span>
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
                                            <a class="dropdown-item" href="#" style="font-size: 16px;" id="deleteData"><i
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
                    url: "{{ route('admin.contact.toggleStatus') }}",
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
