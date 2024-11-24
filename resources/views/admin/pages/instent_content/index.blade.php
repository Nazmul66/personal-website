@extends('admin.layouts.master')

@section('title')
    {{ $title }}
@endsection

@push('css')
@endpush

@section('content')
    {{-- Breadcrumb --}}
    <div class="card_header">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">{{ $title }}</h4>
        </div>
    </div>


    {{-- Body --}}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">

                    <form action="{{ route('admin.instant-content.update', $row->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row align-items-end">
                            <div class="col-md-6 mb-3">
                                <img src="{{ asset($row->image) }}" alt=""
                                    style="display: block; width: 80px; height: 80px;">
                                <label for="question" class="form-label">Image <span class="text-danger">*
                                        Recommended (
                                        1030px X 450px )</span></label>
                                <input id="formFile" type="file" name="image" class="form-control form-control">
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title <span
                                            class="text-danger">*</span></label>
                                    <input name="title" id="title" placeholder="Write title" type="text"
                                        class="form-control" value="{{ $row->title }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mt-3 mb-3">
                            <label for="short_desc" class="form-label">Short Description <span
                                    class="text-danger">*</span></label>
                            <textarea name="short_desc" id="short_desc" class="form-control" cols="30" rows="4"
                                placeholder="Write Here...">{{ $row->short_desc }}</textarea>
                        </div>

                        <div class="col-md-12 mt-3 mb-3">
                            <label for="description" class="form-label">Description <span
                                    class="text-danger">*</span></label>
                            <textarea name="description" id="description" class="form-control" cols="30" rows="7"
                                placeholder="Write Here...">{{ $row->description }}</textarea>
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-info waves-effect waves-light w-md">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @push('script')
        <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

        <script>
            $(document).ready(function() {

                // Ckeditor 5 plugin
                let jReq;
                ClassicEditor
                    .create(document.querySelector('#description'))
                    .then(newEditor => {
                        jReq = newEditor;
                    })
                    .catch(error => {
                        console.error(error);
                    });
            });
        </script>
    @endpush
