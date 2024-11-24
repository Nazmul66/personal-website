@extends('admin.layouts.master')

@section('title')
    {{ 'Admin Role Create' }}
@endsection

@section('roles', 'mm-active')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="m-0">Admin Role Create</h5>
                <span class="float-right">
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-primary"> Back </a>
                </span>
            </div>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('admin.roles.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Role Name</label>
                    <input value="{{ old('name') }}" type="text" class="form-control" name="name" placeholder="Name"
                        required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="mb-3 alignment_margin">
                    <div class="row">
                        <div class="col-3">
                            <div class="custom-control custom-checkbox">
                                <input value="1" type="checkbox" class="custom-control-input" name="permission_all"
                                    id="permission_all">
                                <label for="permission_all" class="custom-control-label text-capitalize">All
                                    Permission</label>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mb-3 alignment_margin">
                    @php $i=1; @endphp
                    @foreach ($permission_groups as $group)
                        <div class="row">
                            <div class="col-3">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input mb-2" type="checkbox"
                                        id="{{ $i }}management"
                                        onclick="CheckPermissionByGroup('role-{{ $i }}-management-checkbox',this)"
                                        value="2">
                                    <label for="{{ $i }}management"
                                        class="custom-control-label text-capitalize">{{ __($group->name) }}</label>
                                </div>
                            </div>

                            <div class="col-9 role-{{ $i }}-management-checkbox">
                                @php
                                    $permissionss = App\Models\Admin::getpermissionsByGroupName($group->name);
                                    $j = 1;
                                @endphp
                                @foreach ($permissionss as $permission)
                                    <div class="custom-control custom-checkbox">
                                        <input name="permissions[]" class="custom-control-input mb-2" type="checkbox"
                                            id="permission_checkbox_{{ $permission->id }}" value="{{ $permission->name }}">
                                        <label for="permission_checkbox_{{ $permission->id }}"
                                            class="custom-control-label mb-2">{{ $permission->name }}</label>
                                    </div>
                                    @php $j++; @endphp
                                @endforeach
                            </div>
                        </div>
                        <hr>
                        @php $i++; @endphp
                    @endforeach
                </div>

                <button type="submit" class="btn btn-success">Save</button>

            </form>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    <script>
        $('#permission_all').click(function() {
            if ($(this).is(':checked')) {
                // check all the checkbox
                $('input[type=checkbox]').prop('checked', true);
            } else {
                // uncheck all the checkbox
                $('input[type=checkbox]').prop('checked', false);
            }
        });

        // check permission by group
        function CheckPermissionByGroup(classname, checkthis) {
            const groupIdName = $("#" + checkthis.id);
            const classCheckBox = $('.' + classname + ' input');
            if (groupIdName.is(':checked')) {
                // check all the checkbox
                classCheckBox.prop('checked', true);
            } else {
                // uncheck all the checkbox
                classCheckBox.prop('checked', false);
            }
        }
    </script>
@endpush
