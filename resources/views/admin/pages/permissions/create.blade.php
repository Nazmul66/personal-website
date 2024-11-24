@extends('admin.layouts.master')

@section('admin-permissions', 'active')
@section('title') Admin| permissions Create @endsection

@push('style')
@endpush

@section('content')
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0 font-size-18">{{ __('Admin permissions create') }}</h4>
    <a href="{{ route('admin.permissions.index') }}" class="btn btn-primary waves-effect waves-light">Back</a>

</div>
<div class="card">
    <div class="card-body">

        <form method="POST" action="{{ route('admin.permissions.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input value="{{ old('name') }}"
                    type="text"
                    class="form-control"
                    name="name"
                    placeholder="Name" required>

                @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="group_name" class="form-label">Group Name</label>
                <input value="{{ old('group_name') }}"
                    type="text" class="form-control"
                    name="group_name" placeholder="Group Name" required>

                @if ($errors->has('group_name'))
                    <span class="text-danger text-left">{{ $errors->first('group_name') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Save</button>

        </form>


    </div>
</div>
@endsection

@push('script')
@endpush
