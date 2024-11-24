@extends('admin.layouts.master')

@section('title')
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
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
                    <form action="{{ route('admin.how-works.section.update', $section->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="header" class="form-label">Section Header <span
                                            class="text-danger">*</span></label>
                                    <input name="header" id="header" placeholder="Write section header" type="text"
                                        class="form-control" value="{{ old('header', $section->title) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Section Title <span
                                            class="text-danger">*</span></label>
                                    <input name="title" id="title" placeholder="Write section title" type="text"
                                        class="form-control" value="{{ old('title', $section->subtitle) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="button_text" class="form-label">Section Button Text <span
                                            class="text-danger">*</span></label>
                                    <input name="button_text" id="button_text" placeholder="Write button text here....."
                                        type="text" class="form-control"
                                        value="{{ old('button_text', $section->button_text) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="button_link" class="form-label">Section Button link <span
                                            class="text-danger">*</span></label>
                                    <input name="button_link" id="button_link" placeholder="Button link here....."
                                        type="url" class="form-control"
                                        value="{{ old('button_link', $section->button_link) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="button_text_2" class="form-label">Section Button2 Text <span
                                            class="text-danger">*</span></label>
                                    <input name="button_text_2" id="button_text_2" placeholder="Write button text here....."
                                        type="text" class="form-control"
                                        value="{{ old('button_text_2', $section->button_text_2) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="button_link_2" class="form-label">Section Button2 link <span
                                            class="text-danger">*</span></label>
                                    <input name="button_link_2" id="button_link_2" placeholder="Button link here....."
                                        type="url" class="form-control"
                                        value="{{ old('button_link_2', $section->button_link_2) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="icon" class="form-label">Section Button2 Icon <span
                                            class="text-danger">*</span></label>
                                    <input name="icon" id="icon" placeholder="Write here...." type="text"
                                        class="form-control" value="{{ old('icon', $section->icon) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="video_link" class="form-label">Is Active <span
                                            class="text-danger">*</span></label>
                                    <select name="is_active" id="is_active" class="form-control form-select">
                                        <option value="1" {{ $section->is_active == 1 ? 'selected' : '' }}>Yes
                                        </option>
                                        <option value="0" {{ $section->is_active == 0 ? 'selected' : '' }}>No
                                        </option>
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
                <h4 class="mb-sm-0 font-size-18">Directions List</h4>
                <a href="{{ route('admin.how-works.create') }}" class="btn btn-primary waves-effect waves-light">Add
                    New</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered mb-0 table table-hover" id="datatables">
                    <thead>
                        <tr>
                            <th>#SL.</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($rows as $key => $row)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $row->title }}</td>
                                <td>{{ $row->description }}</td>
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
                                                <a href="{{ route('admin.how-works.edit', $row->id) }}"
                                                    class="dropdown-item" style="font-size: 16px;"><i
                                                        class='bx bxs-edit text-info me-2'></i>Edit</a>
                                            </li>

                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.how-works.delete', $row->id) }}"
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
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">View Content Generator
                                                List
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="view_modal_content">
                                                <label>Title : </label>
                                                <span class="text-dark">{{ $row->title }}</span>
                                            </div>

                                            <div class="message_content">
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
    <script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
    <script></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script>
        let table = new DataTable('#datatables', {
            responsive: true
        });
    </script>
@endpush
