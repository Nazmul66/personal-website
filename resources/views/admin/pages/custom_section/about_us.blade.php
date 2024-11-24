@extends('admin.layouts.master')

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

                    <form action="{{ route('admin.custom-section.banner.update', $row->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="banner_title" class="form-label">About Title <span
                                            class="text-danger">*</span></label>
                                    <input name="banner_title" id="banner_title" placeholder="Write Banner title"
                                        type="text" class="form-control"
                                        value="{{ old('banner_title', $row->banner_title) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="text_link" class="form-label">link Text <span
                                            class="text-danger">*</span></label>
                                    <input name="text_link" id="text_link" placeholder="Text Link Here....." type="text"
                                        class="form-control" value="{{ old('text_link', $row->text_link) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-end">
                            <div class="col-md-6 mb-3">
                                <img src="{{ asset('assets/images/demo-icon.png') }}" alt=""
                                    style="display: block; width: 80px; height: 80px;">
                                <label for="question" class="form-label">Image <span class="text-danger">* Recommended (
                                        1220px X 1100px )</span></label>
                                <input id="formFile" type="file" class="form-control form-control">
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="link" class="form-label">link </label>
                                    <input name="link" id="link" placeholder="Link Here....." type="url"
                                        class="form-control" value="{{ old('link', $row->link) }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="long_description" class="form-label">Description <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" name="banner_video" id="long_description" placeholder="Video Link paste here...."
                                    rows="8">{{ old('banner_video', $row->banner_video) }}</textarea>
                            </div>
                        </div>

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

                        <div>
                            <button type="submit" class="btn btn-info waves-effect waves-light w-md">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @push('script')
    @endpush
