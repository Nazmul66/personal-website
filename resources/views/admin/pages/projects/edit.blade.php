@extends('admin.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('testimonial', 'mm-active')
@push('css')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" /> --}}
@endpush

@section('content')
    {{-- Breadcrumb --}}
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0 font-size-18">{{ $title }}</h4>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary waves-effect waves-light">Back</a>
    </div>


    {{-- Body --}}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">

                    <form action="{{ route('admin.projects.update', $row->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name <span
                                        class="text-danger">*</span></label>
                                    <input name="name" id="name" placeholder="Name here...." type="text" class="form-control" value="{{ old('name', $row->name) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="url_link" class="form-label">Project Url <span
                                            class="text-danger">*</span></label>
                                    <input name="url_link" id="url_link" placeholder="Link here...." type="url"
                                        class="form-control" value="{{ old('url_link', $row->url_link) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="question" class="form-label">Image <span
                                        class="text-danger">* Recommended (
                                        580px X 580px )</span></label>
                                <input id="formFile" type="file" name="image"
                                    accept=".jpg, .jpeg, .png, .webp" class="form-control form-control">

                                <img id="previewImage" src="{{ getPhoto($row->image) }}" class="mt-3 mb-3" alt="Preview" style="display: block; width: 200px; height: 120px;">
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sstatus" class="form-label">Status <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" name="status" id="sstatus">
                                        <option value="1" @if($row->status == 1) selected @endif>Active</option>
                                        <option value="0" @if($row->status == 0 ) selected @endif>Inactive</option>
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
@endsection

@push('script')
<script>
    document.getElementById('formFile').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('previewImage');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush