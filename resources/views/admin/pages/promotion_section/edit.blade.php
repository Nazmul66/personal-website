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
        <a href="{{ route('admin.promotions.index') }}" class="btn btn-primary waves-effect waves-light">Back</a>
    </div>


    {{-- Body --}}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">

                    <form action="{{ route('admin.promotions.update', $row->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <img src="{{getPhoto($row->icon)}}" class="d-block img mb-4" alt="icon"  style="width: 50px; height: 50px;">
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
                                        class="form-control" value="{{ $row->title }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="button_text" class="form-label">Button Text <span
                                            class="text-danger">*</span></label>
                                    <input name="button_text" id="button_text" placeholder="Write button text here...." type="text"
                                        class="form-control" value="{{ $row->button_text }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="button_link" class="form-label">Button Link <span
                                            class="text-danger">*</span></label>
                                    <input name="button_link" id="button_link" placeholder="Button link here...." type="text"
                                        class="form-control" value="{{ $row->button_link }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="hot" class="form-label">Hot <span class="text-danger">*</span></label>
                                    <select class="form-control" name="hot" id="hot">
                                        <option value="0" @if ($row->hot == 0) selected @endif>No</option>
                                        <option value="1" @if ($row->hot == 1) selected @endif>Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sstatus" class="form-label">Status <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" name="status" id="sstatus">
                                        <option selected value="1" @if ($row->status == 1) selected @endif>Active</option>
                                        <option value="0" @if ($row->status == 0) selected @endif>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="order_id" class="form-label">Order Id <span
                                            class="text-danger">*</span></label>
                                    <input name="order_id" id="order_id" placeholder="Write here...." type="number"
                                        class="form-control" value="{{ $row->order_id }}">
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
@endpush