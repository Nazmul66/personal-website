@extends('admin.layouts.master')

@section('title')
    {{ 'Admin User Role' }}
@endsection

@section('roles', 'mm-active')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="m-0">Admin User Role</h5>
                <a href="{{ route('admin.roles.index') }}" class="btn btn-primary"> Back </a>
            </div>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Role Name</label>
                    <input value="{{ $role->name }}" type="text" class="form-control" name="name"
                        placeholder="Role Name..." required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="mb-3 alignment_margin">
                    <div class="row">
                        <div class="col-3">
                            <div class="custom-control custom-checkbox">
                                <input
                                    {{ App\Models\Admin::roleHasPermission($role, $permissions) ? 'checked' : '' }}
                                    class="custom-control-input" type="checkbox" id="permission_all" value="1">
                                <label for="permission_all" class="custom-control-label">All</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3 alignment_margin">
                    @php $i=1; @endphp
                    @foreach ($permission_groups as $group)
                        @php
                            $permissionss = App\Models\Admin::getpermissionsByGroupName($group->name);
                            $j = 1;
                        @endphp
                        <div class="row">
                            <div class="col-3">
                                <div class="custom-control custom-checkbox">
                                    <input
                                        {{ App\Models\Admin::roleHasPermission($role, $permissions) ? 'checked' : '' }}
                                        class="custom-control-input" type="checkbox" id="{{ $i }}management"
                                        onclick="CheckPermissionByGroup('role-{{ $i }}-management-checkbox',this)"
                                        value="2">
                                    <label for="{{ $i }}management"
                                        class="custom-control-label text-capitalize">{{ $group->name }}</label>
                                </div>
                            </div>
                            <div class="col-9 role-{{ $i }}-management-checkbox">
                                @foreach ($permissionss as $permission)
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input
                                            onclick="checksinglepermission('role-{{ $i }}-management-checkbox','{{ $i }}management',{{ count($permissionss) }})"
                                            {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                                            name="permissions[]" class="custom-control-input" type="checkbox"
                                            id="permission_checkbox_{{ $permission->id }}"
                                            value="{{ $permission->name }}">
                                        <label for="permission_checkbox_{{ $permission->id }}"
                                            class="custom-control-label">{{ __($permission->name) }}</label>
                                    </div>
                                    @php $j++; @endphp
                                @endforeach
                            </div>
                        </div>
                        <hr>
                        @php $i++; @endphp
                    @endforeach
                </div>
                <button type="submit" class="btn btn-success">Update</button>
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
