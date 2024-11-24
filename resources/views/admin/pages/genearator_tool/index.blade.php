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

                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="banner_title" class="form-label">Title <span
                                            class="text-danger">*</span></label>
                                    <input name="banner_title" id="banner_title" placeholder="Write Banner title"
                                        type="text" class="form-control" value="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="text_link" class="form-label">Sub-Title <span
                                            class="text-danger">*</span></label>
                                    <input name="text_link" id="text_link" placeholder="Text Link Here....." type="text"
                                        class="form-control" value="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="banner_title" class="form-label">Short Description <span
                                            class="text-danger">*</span></label>
                                    <input name="banner_title" id="banner_title" placeholder="Write Banner title"
                                        type="text" class="form-control" value="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="text_link" class="form-label">Text Link <span
                                            class="text-danger">*</span></label>
                                    <input name="text_link" id="text_link" placeholder="Text Link Here....." type="text"
                                        class="form-control" value="">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3 align-items-end">
                            <div class="card-title mb-1">
                                <h4 class="mb-2">Content 1</h4>
                            </div>

                            <div class="col-md-3">
                                <img src="{{ asset('assets/images/demo-icon.png') }}" alt=""
                                    style="display: block; width: 80px; height: 80px;">
                                <label for="question" class="form-label mt-1">Content Image <span class="text-danger">*
                                        Recommended ( 220px X 220px )</span></label>
                                <input id="formFile" type="file" class="form-control form-control">
                            </div>

                            <div class="col-md-3">
                                <label for="banner_title" class="form-label">Content Title <span
                                        class="text-danger">*</span></label>
                                <input name="banner_title" id="banner_title" placeholder="Write Here..." type="text"
                                    class="form-control" value="">
                            </div>

                            <div class="col-md-3">
                                <label for="banner_title" class="form-label">Content Text Link <span
                                        class="text-danger">*</span></label>
                                <input name="banner_title" id="banner_title" placeholder="Write Here..." type="text"
                                    class="form-control" value="">
                            </div>

                            <div class="col-md-3">
                                <label for="badge" class="form-label">Tool Status <span
                                        class="text-danger">*</span></label>
                                <select class="form-control" id="badge" name="badge">
                                    <option selected>Hot</option>
                                    <option>New</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3 align-items-end">
                            <div class="card-title mb-1">
                                <h4 class="mb-2">Content 2</h4>
                            </div>

                            <div class="col-md-3">
                                <img src="{{ asset('assets/images/demo-icon.png') }}" alt=""
                                    style="display: block; width: 80px; height: 80px;">
                                <label for="question" class="form-label mt-1">Content Image <span class="text-danger">*
                                        Recommended ( 220px X 220px )</span></label>
                                <input id="formFile" type="file" class="form-control form-control">
                            </div>

                            <div class="col-md-3">
                                <label for="banner_title" class="form-label">Content Title <span
                                        class="text-danger">*</span></label>
                                <input name="banner_title" id="banner_title" placeholder="Write Here..." type="text"
                                    class="form-control" value="">
                            </div>

                            <div class="col-md-3">
                                <label for="banner_title" class="form-label">Content Text Link <span
                                        class="text-danger">*</span></label>
                                <input name="banner_title" id="banner_title" placeholder="Write Here..." type="text"
                                    class="form-control" value="">
                            </div>

                            <div class="col-md-3">
                                <label for="badge" class="form-label">Tool Status <span
                                        class="text-danger">*</span></label>
                                <select class="form-control" id="badge" name="badge">
                                    <option selected>Hot</option>
                                    <option>New</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3 align-items-end">
                            <div class="card-title mb-1">
                                <h4 class="mb-2">Content 3</h4>
                            </div>

                            <div class="col-md-3">
                                <img src="{{ asset('assets/images/demo-icon.png') }}" alt=""
                                    style="display: block; width: 80px; height: 80px;">
                                <label for="question" class="form-label mt-1">Content Image <span class="text-danger">*
                                        Recommended ( 220px X 220px )</span></label>
                                <input id="formFile" type="file" class="form-control form-control">
                            </div>

                            <div class="col-md-3">
                                <label for="banner_title" class="form-label">Content Title <span
                                        class="text-danger">*</span></label>
                                <input name="banner_title" id="banner_title" placeholder="Write Here..." type="text"
                                    class="form-control" value="">
                            </div>

                            <div class="col-md-3">
                                <label for="banner_title" class="form-label">Content Text Link <span
                                        class="text-danger">*</span></label>
                                <input name="banner_title" id="banner_title" placeholder="Write Here..." type="text"
                                    class="form-control" value="">
                            </div>

                            <div class="col-md-3">
                                <label for="badge" class="form-label">Tool Status <span
                                        class="text-danger">*</span></label>
                                <select class="form-control" id="badge" name="badge">
                                    <option selected>Hot</option>
                                    <option>New</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3 align-items-end">
                            <div class="card-title mb-1">
                                <h4 class="mb-2">Content 4</h4>
                            </div>

                            <div class="col-md-3">
                                <img src="{{ asset('assets/images/demo-icon.png') }}" alt=""
                                    style="display: block; width: 80px; height: 80px;">
                                <label for="question" class="form-label mt-1">Content Image <span class="text-danger">*
                                        Recommended ( 220px X 220px )</span></label>
                                <input id="formFile" type="file" class="form-control form-control">
                            </div>

                            <div class="col-md-3">
                                <label for="banner_title" class="form-label">Content Title <span
                                        class="text-danger">*</span></label>
                                <input name="banner_title" id="banner_title" placeholder="Write Here..." type="text"
                                    class="form-control" value="">
                            </div>

                            <div class="col-md-3">
                                <label for="banner_title" class="form-label">Content Text Link <span
                                        class="text-danger">*</span></label>
                                <input name="banner_title" id="banner_title" placeholder="Write Here..." type="text"
                                    class="form-control" value="">
                            </div>

                            <div class="col-md-3">
                                <label for="badge" class="form-label">Tool Status <span
                                        class="text-danger">*</span></label>
                                <select class="form-control" id="badge" name="badge">
                                    <option selected>Hot</option>
                                    <option>New</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3 align-items-end">
                            <div class="card-title mb-1">
                                <h4 class="mb-2">Content 5</h4>
                            </div>

                            <div class="col-md-3">
                                <img src="{{ asset('assets/images/demo-icon.png') }}" alt=""
                                    style="display: block; width: 80px; height: 80px;">
                                <label for="question" class="form-label mt-1">Content Image <span class="text-danger">*
                                        Recommended ( 220px X 220px )</span></label>
                                <input id="formFile" type="file" class="form-control form-control">
                            </div>

                            <div class="col-md-3">
                                <label for="banner_title" class="form-label">Content Title <span
                                        class="text-danger">*</span></label>
                                <input name="banner_title" id="banner_title" placeholder="Write Here..." type="text"
                                    class="form-control" value="">
                            </div>

                            <div class="col-md-3">
                                <label for="banner_title" class="form-label">Content Text Link <span
                                        class="text-danger">*</span></label>
                                <input name="banner_title" id="banner_title" placeholder="Write Here..." type="text"
                                    class="form-control" value="">
                            </div>

                            <div class="col-md-3">
                                <label for="badge" class="form-label">Tool Status <span
                                        class="text-danger">*</span></label>
                                <select class="form-control" id="badge" name="badge">
                                    <option selected>Hot</option>
                                    <option>New</option>
                                </select>
                            </div>
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
