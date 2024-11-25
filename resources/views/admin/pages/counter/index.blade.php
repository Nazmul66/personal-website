@extends('admin.layouts.master')

@section('title')
    {{ $title }}
@endsection

@push('css')
    <style>
        @media (min-width: 768px) {
            .col-md-2 {
                flex: 0 0 auto;
                width: 12.666667%;
            }

            .col-md-10 {
                flex: 0 0 auto;
                width: 87.333333%;
            }
        }
    </style>
@endpush

@section('content')
    {{-- Breadcrumb --}}
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0 font-size-18">{{ $title }}</h4>
    </div>

    {{-- Body --}}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">

                    <form action="{{ route('admin.counter.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="team_name" class="form-label">Team Name <span
                                            class="text-danger">*</span></label>
                                    <input name="team_name" id="team_name" type="text"
                                        class="form-control" value="{{ old('team_name', $row->team_name) }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="team_count" class="form-label">Team Count <span
                                            class="text-danger">*</span></label>
                                    <input name="team_count" id="team_count" type="text"
                                        class="form-control" value="{{ old('team_count', $row->team_count) }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="team_icon" class="form-label">Team Icon <span
                                            class="text-danger">*</span></label>
                                    <input name="team_icon" id="team_icon" type="text"
                                        class="form-control" value="{{ old('team_icon', $row->team_icon) }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="team_icon_bg" class="form-label">Team BG Color <span class="text-danger">*</span></label>
                                    <input name="team_icon_bg" class="form-control form-control-color" style="width: 100%;" id="team_icon_bg"  type="color" class="form-control" value="{{ old('team_icon_bg', $row->team_icon_bg ?? '#CDAF42') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="project_name" class="form-label">Project Name <span
                                            class="text-danger">*</span></label>
                                    <input name="project_name" id="project_name" type="text"
                                        class="form-control" value="{{ old('project_name', $row->project_name) }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="project_count" class="form-label">Project Count <span
                                            class="text-danger">*</span></label>
                                    <input name="project_count" id="project_count" type="text"
                                        class="form-control" value="{{ old('project_count', $row->project_count) }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="project_icon" class="form-label">Project Icon <span
                                            class="text-danger">*</span></label>
                                    <input name="project_icon" id="project_icon" type="text"
                                        class="form-control" value="{{ old('project_icon', $row->project_icon) }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="project_icon_bg" class="form-label">Project BG Color <span class="text-danger">*</span></label>
                                    <input name="project_icon_bg" class="form-control form-control-color" style="width: 100%;" id="project_icon_bg"  type="color" class="form-control" value="{{ old('project_icon_bg', $row->project_icon_bg ?? '#CDAF42') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="review_name" class="form-label">Review Name <span
                                            class="text-danger">*</span></label>
                                    <input name="review_name" id="review_name" type="text"
                                        class="form-control" value="{{ old('review_name', $row->review_name) }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="review_count" class="form-label">Review Count <span class="text-danger">*</span></label>
                                    <input name="review_count" id="review_count" type="text"
                                        class="form-control" value="{{ old('review_count', $row->review_count) }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="review_icon" class="form-label">Review Icon <span
                                            class="text-danger">*</span></label>
                                    <input name="review_icon" id="review_icon" type="text"
                                        class="form-control" value="{{ old('review_icon', $row->review_icon) }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="review_icon_bg" class="form-label">Review BG Color <span class="text-danger">*</span></label>
                                    <input name="review_icon_bg" class="form-control form-control-color" style="width: 100%;" id="review_icon_bg"  type="color" class="form-control" value="{{ old('review_icon_bg', $row->review_icon_bg ?? '#CDAF42') }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="is_active" class="form-label">Is Active <span class="text-danger">*</span></label>
                                <select name="is_active" id="is_active" class="form-control form-select">
                                    <option value="1" @if( $row->is_active == 1 ) selected @endif>Yes</option>
                                    <option value="0" @if( $row->is_active == 0 ) selected @endif>No</option>
                                </select>
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
