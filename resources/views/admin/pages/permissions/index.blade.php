@extends('admin.layouts.master')

@section('admin-permissions', 'active')
@section('title') Admin| permissions @endsection

@push('style')
@endpush

@section('content')

<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0 font-size-18">{{ __('Admin permissions') }}</h4>
    <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary waves-effect waves-light">Add new</a>

</div>
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="20%">Name</th>
                <th scope="col" width="20%">Group</th>
                <th scope="col" width="10%">Guard</th>
                <th scope="col" colspan="3" width="5%"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->group_name }}</td>
                        <td>{{ $permission->guard_name }}</td>


                        <td>
                            <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-info btn-xs">Edit</a>
                            <form method="POST" action="{{ route('admin.permissions.destroy', $permission->id) }}" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                            </form>
                            {{-- {!! Form::open(['method' => 'POST','route' => ['admin.permissions.destroy', $permission->id],'style'=>'display:inline', 'class' => 'delete-form']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!} --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection

@push('script')
<script>
$(document).on("submit", ".delete-form", function(e) {
    var form = this;
    e.preventDefault();
    Swal.fire({
        title: "{{__('main.want_to_delete')}}",
        text: "{{__('main.permanently_delete')}}",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#8bc34a',
        cancelButtonColor: '#d33',
        cancelButtonText: "{{__('main.cancel')}}",
        confirmButtonText: "{{__('main.yes_delete')}}",
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    })
});
</script>
@endpush
