@extends('admin.layouts.master')

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


    {{-- Body --}}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">

                    <form action="{{ route('admin.custom-section.privacy.policy.update', $row->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="meta_title" class="form-label">Meta Title </label>
                                <input name="meta_title" id="meta_title" placeholder="Write Meta Title....." type="text"
                                    class="form-control" value="{{ old('meta_title', $row->meta_title) }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="meta_keyword" class="form-label">Meta Keywords </label>
                                <input name="meta_keyword" id="meta_keyword" placeholder="Write Meta Keyword....."
                                    type="text" class="form-control"
                                    value="{{ old('meta_keyword', $row->meta_keyword) }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="meta_description" class="form-label">Meta Description </label>
                                <textarea name="meta_description" id="meta_description" class="form-control" required=""
                                    placeholder="Write Description Here..." rows="3">{{ old('meta_title', $row->meta_description) }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="long_description" class="form-label">Description<span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" name="banner_video" id="long_description" placeholder="Write here...." rows="8">{{ old('banner_video', $row->banner_video) }}</textarea>
                            </div>
                        </div>

                        <div>
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
            // Ckeditor 5 plugin
            let jReq;
            ClassicEditor
                .create(document.querySelector('#long_description'))
                .then(newEditor => {
                    jReq = newEditor;
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush
