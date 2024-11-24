@extends('admin.layouts.master')

@section('title')
    {{ 'Admin roles' }}
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-between justify-content-between">
                <h5 class="m-0">Admin roles</h5>
                <span class="float-right">
                    <a href="{{ route('admin.admin.index') }}" class="btn btn-primary">All Admins</a>
                    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">Create Role</a>
                </span>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th width="1%">#SL.</th>
                    <th>Name</th>
                    <th>Permission</th>
                    <th width="10%" colspan="3" class="text-center">Action</th>
                </tr>
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>
                            <span style="white-space: nowrap;">
                                {{ $role->name }}
                            </span>
                        </td>
                        <td>
                            <div>
                                @foreach ($role->permissions as $item)
                                    <span
                                        class="badge_permission">{{ $item->name }}</span>
                                @endforeach
                            </div>
                        </td>
                        <td class="text-center">
                            {{-- <a class="btn btn-info btn-xs"
                                href="{{ route('admin.roles.show', $role->id) }}">Show</a> --}}

                            <a class="btn btn-primary btn-xs" href="{{ route('admin.roles.edit', $role->id) }}"><i
                                    class="fa fa-pencil"></i> Edit</a>


                            {{-- <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
                                class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button
                                    onclick="return confirm('Are you sure you want to delete this item?');"
                                    class="btn btn-danger btn-xs">Delete</button>
                            </form> --}}

                        </td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
@endpush
