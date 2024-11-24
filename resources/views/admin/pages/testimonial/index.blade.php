@extends('admin.layouts.master')

@section('title')
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/feature.css') }}">
@endpush

@section('content')
    {{-- Breadcrumb --}}
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0 font-size-18">{{ $title }}</h4>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">

                    <form action="{{ route('admin.testimonials.section.update', $section->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Service Title <span
                                                class="text-danger">*</span></label>
                                        <input name="title" id="title" placeholder="Write service title" type="text"
                                            class="form-control" value="{{ old('title', $section->title) }}">
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="subtitle" class="form-label">Service Subtitle <span
                                                class="text-danger">*</span></label>
                                        <input name="subtitle" id="subtitle" placeholder="Write service subtitle" type="text"
                                            class="form-control" value="{{ old('subtitle', $section->subtitle) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="video_link" class="form-label">Is Active <span
                                            class="text-danger">*</span></label>
                                    <select name="is_active" id="is_active" class="form-control form-select">
                                        <option value="1" {{ $section->is_active == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ $section->is_active == 0 ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div>
                            <button type="submit" class="btn btn-info waves-effect waves-light w-md">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Tables --}}
    <div class="card">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h4 class="mb-sm-0 font-size-18">Testimonials List</h4>
                <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary waves-effect waves-light">Add New</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered mb-0 table-hover" id="datatables">
                    <thead>
                        <tr>
                            <th>#SL.</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($rows as $key => $row)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td class="text-center">
                                    <a href="{{ getPhoto($row->image) }}" target="__blank">
                                        <img src="{{ getPhoto($row->image) }}" alt="icon"
                                            style="width: 70px; height: 70px; object-fit: contain;">
                                    </a>
                                </td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->designation }}</td>
                                <td>
                                    @if ($row->status == 1)
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
                                            <li>
                                                <button class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#view_modal{{ $row->id }}"
                                                    style="font-size: 16px;"><i
                                                        class="fas fa-eye"></i> View</button>
                                            </li>

                                            <li>
                                                <a href="{{ route('admin.testimonials.edit', $row->id) }}"
                                                    class="dropdown-item" style="font-size: 16px;"><i
                                                        class='bx bxs-edit text-info me-2'></i>Edit</a>
                                            </li>

                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.testimonials.delete', $row->id) }}"
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
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">View Testimonials List
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="view_modal_content">
                                                <label>Image : </label>
                                                <a href="{{ getPhoto($row->image) }}" target="__blank">
                                                    <img src="{{ getPhoto($row->image) }}" alt="icon"
                                                        style="width: 70px; height: 70px; object-fit: contain;">
                                                </a>
                                            </div>

                                            <div class="view_modal_content">
                                                <label>Name : </label>
                                                <span class="text-dark">{{ $row->name }}</span>
                                            </div>

                                            <div class="view_modal_content">
                                                <label>Designation : </label>
                                                <span class="text-dark">{{ $row->designation }}</span>
                                            </div>

                                            <div class="view_modal_content">
                                                <label>Description : </label>
                                                <span class="text-dark">{{ $row->description }}</span>
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
