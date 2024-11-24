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

                    <form action="{{ route('admin.guide-content.update', $row->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title <span
                                            class="text-danger">*</span></label>
                                    <input name="title" id="title" placeholder="Write title" type="text"
                                        class="form-control" value="{{ $row->title }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="short_desc" class="form-label">Short Description <span
                                            class="text-danger">*</span></label>
                                    <input name="short_desc" id="short_desc" placeholder="Write Short Description..."
                                        type="text" class="form-control" value="{{ $row->short_desc }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="action_text" class="form-label">content Action Text</label>
                                    <input name="action_text" id="action_text" placeholder="Write Here....." type="text"
                                        class="form-control" value="{{ $row->action_text }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="action_link" class="form-label">content Action Text Link <span
                                            class="text-danger">*</span></label>
                                    <input name="action_link" id="action_link" placeholder="Url Here....." type="url"
                                        class="form-control" value="{{ $row->action_link }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="video_text" class="form-label">Video Content Text</label>
                                    <input name="video_text" id="video_text" placeholder="Write Here....." type="text"
                                        class="form-control" value="{{ $row->video_text }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mt-3 align-items-end">
                                    <div class="card-title mb-1">
                                        <h4 class="mb-2">Content 1</h4>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="title_1" class="form-label">Content Title <span
                                                class="text-danger">*</span></label>
                                        <input name="title_1" id="title_1" placeholder="Write Here..." type="text"
                                            class="form-control" value="{{ $row->title_1 }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="desc_1" class="form-label">Content short Description <span
                                                class="text-danger">*</span></label>
                                        <input name="desc_1" id="desc_1" placeholder="Write Here..." type="text"
                                            class="form-control" value="{{ $row->desc_1 }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row mt-3 align-items-end">
                                    <div class="card-title mb-1">
                                        <h4 class="mb-2">Content 2</h4>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="title_2" class="form-label">Content Title <span
                                                class="text-danger">*</span></label>
                                        <input name="title_2" id="title_2" placeholder="Write Here..." type="text"
                                            class="form-control" value="{{ $row->title_2 }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="desc_2" class="form-label">Content short Description <span
                                                class="text-danger">*</span></label>
                                        <input name="desc_2" id="desc_2" placeholder="Write Here..." type="text"
                                            class="form-control" value="{{ $row->desc_2 }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3 align-items-end">
                            <div class="card-title mb-1">
                                <h4 class="mb-2">Content 3</h4>
                            </div>

                            <div class="col-md-3">
                                <label for="title_3" class="form-label">Content Title <span
                                        class="text-danger">*</span></label>
                                <input name="title_3" id="title_3" placeholder="Write Here..." type="text"
                                    class="form-control" value="{{ $row->title_3 }}">
                            </div>

                            <div class="col-md-3">
                                <label for="desc_3" class="form-label">Content short Description <span
                                        class="text-danger">*</span></label>
                                <input name="desc_3" id="desc_3" placeholder="Write Here..." type="text"
                                    class="form-control" value="{{ $row->desc_3 }}">
                            </div>
                        </div>

                        <div class="col-md-6 mt-3 mb-3">
                            <label for="video_link" class="form-label">Video Link <span
                                    class="text-danger">*</span></label>
                            <textarea name="video_link" id="video_link" class="form-control" cols="30" rows="6"
                                placeholder="Link Here...">{{ $row->video_link }}</textarea>
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
    @endpush
