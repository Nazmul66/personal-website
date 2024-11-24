@extends('admin.layouts.master')

@section('title')
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
@endpush

@section('content')
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
                            <th>Email</th>
                            <th>Date</th>
                            {{-- <th>Order ID</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($rows as $key => $row)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>
                                    <a href="mailto:{{ $row->email }}">{{ $row->email }}</a>
                                </td>
                                <td>
                                    <span class="text-dark"
                                        style="white-space: nowrap;">{{ date('Y-m-d', strtotime($row->date)) }}</span>
                                </td>
                                {{-- <td>
                                    <span class="text-dark">{{ $row->order_id }}</span>
                                </td> --}}
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
                                            {{-- <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.subscription.delete', $row->id) }}"
                                                    style="font-size: 16px;" id="deleteData"><i
                                                        class='bx bxs-trash text-danger'></i> Delete</a>
                                            </li> --}}
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
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">View Subscription List</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="view_modal_content">
                                                <label>Email : </label>
                                                <a href="mailto:{{ $row->email }}"
                                                    class="text-info">{{ $row->email }}</a>
                                            </div>

                                            <div class="view_modal_content">
                                                <label>Date : </label>
                                                <span class="text-dark">{{ date('Y-m-d', strtotime($row->date)) }}</span>
                                            </div>

                                            {{-- <div class="view_modal_content">
                                                <label>Order ID : </label>
                                                <span class="text-dark">{{ $row->order_id }}</span>
                                            </div> --}}
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

    <script>
        let table = new DataTable('#datatables', {
            responsive: true
        });
    </script>
@endpush
