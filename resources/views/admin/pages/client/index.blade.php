@extends('admin.layouts.master')

@section('title')
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
@endpush

@section('content')
    {{-- Breadcrumb --}}
    <div class="card_header">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">{{ $title }}</h4>
        </div>
    </div>


    {{-- Tables --}}
    <div class="card_body">
        <div class="table-responsive">
            <table class="table table-bordered mb-0 table table-hover" id="datatables">
                <thead>
                    <tr>
                        <th>#SL.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>John Smith</td>
                        <td>
                            <a href="mailto:john.smith@example.com">john.smith@example.com</a>
                        </td>
                        <td>
                            <a href="tel: (212) 555-0123"> (212) 555-0123</a>
                        </td>
                        <td>
                            <span class="text-dark">200 E 34th St, New York, NY 10016</span>
                        </td>
                        <td>
                            <span class="text-dark">2024-10-01</span>
                        </td>
                        <td>
                            <span class="text-success">Active</span>
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
                    </tr>

                    <tr>
                        <th scope="row">2</th>
                        <td>Emily Johnson</td>
                        <td>
                            <a href="mailto:emily.johnson@example.com">emily.johnson@example.com</a>
                        </td>
                        <td>
                            <a href="tel:(646) 555-0456">(646) 555-0456</a>
                        </td>
                        <td>
                            <span class="text-dark">45 W 45th St, New York, NY 10036</span>
                        </td>
                        <td>
                            <span class="text-dark">2024-10-15</span>
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
                    </tr>

                    <tr>
                        <th scope="row">3</th>
                        <td>Michael Lee</td>
                        <td>
                            <a href="mailto:michael.lee@example.com">michael.lee@example.com</a>
                        </td>
                        <td>
                            <a href="tel:(917) 555-0678">(917) 555-0678</a>
                        </td>
                        <td>
                            <span class="text-dark">789 Broadway, New York, NY 10003</span>
                        </td>
                        <td>
                            <span class="text-dark"> 2024-10-20</span>
                        </td>
                        <td>
                            <span class="text-success">Active</span>
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
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <!-- View Modal -->
    <div class="modal fade" id="view_modal" tabindex="-1" aria-labelledby="edit_lLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">View Client List</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class='bx bx-x text-white' style="font-size: 28px;"></i></button>
                </div>

                <div class="modal-body">
                    <div class="view_modal_content">
                        <label>Name : </label>
                        <span class="text-dark">John Smith</span>
                    </div>

                    <div class="view_modal_content">
                        <label>Email : </label>
                        <a href="mailto:john.smith@example.com" class="text-info">john.smith@example.com</a>
                    </div>

                    <div class="view_modal_content">
                        <label>Phone : </label>
                        <a href="tel:(212) 555-0123" class="text-info">(212) 555-0123</a>
                    </div>

                    <div class="message_content">
                        <label>Address : </label>
                        <span class="text-dark">200 E 34th St, New York, NY 10016</span>
                    </div>

                    <div class="view_modal_content">
                        <label>Date : </label>
                        <span class="text-dark">2024-10-01</span>
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

    <script>
        let table = new DataTable('#datatables', {
            responsive: true
        });
    </script>
@endpush
