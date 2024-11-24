@extends('admin.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('promotions', 'mm-active')
@push('css')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" /> --}}
@endpush

@section('content')
    {{-- Breadcrumb --}}
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0 font-size-18">{{ $title }}</h4>
        <a href="{{ route('admin.content-generator.index') }}" class="btn btn-primary waves-effect waves-light">Back</a>
    </div>


    {{-- Body --}}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">

                    <form action="{{ route('admin.promotions.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="icon" class="form-label">Icon <span class="text-danger">* Recommendation ( 50px X 50px )</span></label>
                                    <input id="icon" type="file" name="icon"
                                        class="form-control form-control-file">
                                    {{-- <input name="icon" id="icon" placeholder="Write here...." type="text"
                                        class="form-control" value="{{ old('icon') }}"> --}}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title <span
                                            class="text-danger">*</span></label>
                                    <input name="title" id="title" placeholder="Write here...." type="text"
                                        class="form-control" value="{{ old('title') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="button_text" class="form-label">Button Text <span
                                            class="text-danger">*</span></label>
                                    <input name="button_text" id="button_text" placeholder="Write button text here...." type="text"
                                        class="form-control" value="{{ old('button_text') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="button_link" class="form-label">Button Link <span
                                            class="text-danger">*</span></label>
                                    <input name="button_link" id="button_link" placeholder="Button link here...." type="text"
                                        class="form-control" value="{{ old('button_link') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="hot" class="form-label">Hot <span class="text-danger">*</span></label>
                                    <select class="form-control" name="hot" id="hot">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sstatus" class="form-label">Status <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" name="status" id="sstatus">
                                        <option selected value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-info waves-effect waves-light w-md">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @push('script')
    @endpush
