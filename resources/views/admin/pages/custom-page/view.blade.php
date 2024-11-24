@extends('admin.layouts.master')

@section('cpage_list', 'mm-active')

@section('title') {{ $data['title'] ?? '' }} @endsection

@php
    $row = $data['row'];
@endphp

@push('style')
    <style>
        td {
            width: 0;
        }
    </style>
@endpush

@section('content')
    {{-- Breadcrumb --}}
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0 font-size-18">View {{ $row->title }} pages</h4>
        <a href="{{ route('admin.cpage.index') }}" class="btn btn-primary waves-effect waves-light">Back</a>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <table class="table">
                    <tr>
                        <td style="width:10%;"><strong>Page Name :</strong></td>
                        <td>{{ $row->title }}</td>
                    </tr>
                    <tr>
                        <td><strong>Page Slug :</strong></td>
                        <td>{{ $row->url_slug }}</td>
                    </tr>
                    <tr>
                        <td><strong>Status :</strong></td>
                        <td>
                            @if ($row->is_active == 1)
                                <span class="text-success">Active</span>
                            @else
                                <span class="text-danger">Inactive</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <strong class="mb-3 d-block" style="font-size: 20px;">Description :</strong>
                            <br>
                            {!! $row->body !!}
                        </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>

@endsection
