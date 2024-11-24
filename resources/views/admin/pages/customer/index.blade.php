@extends('admin.layouts.master')
@php
    $title = $data['title'];
    $rows = $data['rows'];
    $plans = $data['plans'];
@endphp

@section('title')
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
@endpush


@section('content')
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0 font-size-18">{{ $title }}</h4>
    </div>


    {{-- Tables --}}
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-0 table table-hover" id="datatables">
                    <thead>
                        <tr>
                            <th>#SL.</th>
                            <th>UserName</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Discord ID</th>
                            <th>Created at</th>
                            {{-- <th>Order ID</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($rows as $key => $row)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{$row->username}}</td>
                                <td>{{$row->name}} {{$row?->last_name}}</td>
                                <td>
                                    <a href="mailto:{{ $row->email }}">{{ $row->email }}</a>
                                </td>
                                <td>{{$row->discord_id}}</td>
                                <td>
                                    <span class="text-dark"
                                        style="white-space: nowrap;">{{ date('d M Y', strtotime($row->created_at)) }}</span>
                                </td>
                                {{-- <td>
                                    <span class="text-dark">{{ $row->order_id }}</span>
                                </td> --}}
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary waves-effect waves-light dropdown-toggle"
                                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <button class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#view_modal{{ $row->id }}" style="font-size: 16px;">
                                                    <i class="fas fa-eye"></i>
                                                     View
                                                </button>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin.customer.edit', $row->id) }}" class="dropdown-item"
                                                    style="font-size: 16px;"><i class='bx bxs-edit text-info'></i> Edit</a>
                                            </li>
                                            <li>
                                                <a href="{{route('admin.customer.viewSession', $row->id)}}" class="dropdown-item"
                                                    style="font-size: 16px;"><i class='bx bxs-info-circle' ></i> Session History</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item open-subscription-modal"
                                                    style="font-size: 16px;"  data-bs-toggle="modal" data-bs-target="#subscription_modal" data-id="{{ $row->id }}">
                                                    <i class='bx bxs-package' ></i>
                                                    Subscription
                                                </a>
                                            </li>
                                            {{-- <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.subscription.delete', $row->id) }}"
                                                    style="font-size: 16px;" id="deleteData"><i
                                                        class='bx bxs-trash text-danger'></i> Delete</a>
                                            </li> --}}
                                        </ul>
                                    </div>
                                </td>
                            </tr>


                             <!-- View Modal -->
                            <div class="modal fade" id="view_modal{{ $row->id }}" tabindex="-1"
                                aria-labelledby="edit_lLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">View Customer</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="view_modal_content">
                                                <label>First Name : </label>
                                               <span>{{$row->name}}</span>
                                            </div>
                                            <div class="view_modal_content">
                                                <label>Last Name : </label>
                                               <span>{{$row->last_name}}</span>
                                            </div>
                                            <div class="view_modal_content">
                                                <label>Username : </label>
                                               <span>{{$row->username}}</span>
                                            </div>
                                            <div class="view_modal_content">
                                                <label>Email : </label>
                                                <a href="mailto:{{ $row->email }}"
                                                    class="text-info">{{ $row->email }}</a>
                                            </div>
                                            <div class="view_modal_content">
                                                <label>Discord ID : </label>
                                                <span>{{$row->discord_id}}</span>
                                            </div>
                                            <div class="view_modal_content">
                                            <label>Join At : </label>
                                            <span class="text-dark">{{ date('d M Y', strtotime($row->created_at)) }}</span>
                                            </div>

                                            @if ($row->current_pan_id)
                                            <div class="view_modal_content">
                                                <label>Current Plan Name : </label>
                                                <span class="text-dark">{{ ($row->userPlan->title) }}</span>
                                            </div>
                                            @endif
                                            @if ($row->current_pan_id)
                                            <div class="view_modal_content">
                                                <label>Current Plan Expire Date : </label>
                                                <span class="text-dark">{{ date('d M Y', strtotime($row->current_pan_expire_date)) }}</span>
                                            </div>
                                            @endif

                                            {{-- <div class="view_modal_content">
                                                <label>Order ID : </label>
                                                <span class="text-dark">{{ $row->order_id }}</span>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="subscription_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Subscription</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="modal_body"></div>
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="modal fade" id="subscription_modal" tabindex="-1" aria-labelledby="subscriptionLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModalLabel">Subscription</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="modal_body"></div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@push('script')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script type="text/javascript">
        $(document).on('click', '.open-subscription-modal', function() {
            let id = $(this).data('id');

            $.get('customer/subscription/' + id, function(response) {
                // Inject the fetched HTML content into the modal body
                $('#modal_body').html(response.html);
                // Show the modal
                $('#subscription_modal').modal('show');
            }).fail(function() {
                alert('Failed to load subscription details. Please try again.');
            });
        });
    </script>

    {{-- <script>
        let table = new DataTable('#datatables', {
            responsive: true
        });
        $(document).on('click', '.open-subscription-modal', function () {
            const userId = $(this).data('id');
            const modal = $('#subscription_modal');
            const modalContent = $('#modal-content');

            $.ajax({
                url: `/admin/customer/subscription/${userId}`,
                type: 'GET',
                success: function (response) {
                    modalContent.html(response.html); // Load content into modal
                    modal.modal('show'); // Show modal
                },
                error: function () {
                    alert('Failed to load the subscription details.');
                }
            });
        });
    </script> --}}

@endpush
