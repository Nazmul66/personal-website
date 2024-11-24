@extends('admin.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('content_generator', 'mm-active')

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

                    <form action="{{ route('admin.content-generator.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="icon" class="form-label">Icon <span
                                            class="text-danger">*</span></label>
                                    <input name="icon" id="icon" placeholder="Write here...." type="text"
                                        class="form-control" value="{{ old('icon') }}">
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
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="description" class="form-label">Description <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" id="description" placeholder="Write here...." rows="8">{{ old('description') }}</textarea>
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
