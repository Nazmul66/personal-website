@extends('admin.layouts.master')

@section('title')
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap5-toggle@5.1.1/css/bootstrap5-toggle.min.css" rel="stylesheet">
@endpush

@section('content')
    {{-- Breadcrumb --}}
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0 font-size-18">{{ $title }}</h4>
        <button class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#create_modal">Add
            New</button>
    </div>


    <!-- Create Modal -->
    <div class="modal fade" id="create_modal" tabindex="-1" aria-labelledby="createLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Faq</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.faq.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="question" class="form-label">Question <span class="text-danger">*</span></label>
                            <input type="text" name="question" id="question" placeholder="Write Your Question...."
                                class="form-control" value="{{ old('question') }}">
                        </div>

                        <div class="mb-3">
                            <label for="answer" class="form-label">Answer <span class="text-danger">*</span></label>
                            <textarea name="answer" id="answer" class="form-control" cols="30" rows="6"
                                placeholder="Write Your Answer....">{{ old('answer') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="statuss" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-control" name="status" id="statuss">
                                <option selected="" value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger waves-effect waves-light"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


    {{-- Tables --}}
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-0 table table-hover" id="datatables">
                    <thead>
                        <tr>
                            <th>#SL.</th>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Status</th>
                            {{-- <th>Order Number</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody id="sortable">
                        @foreach ($rows as $key => $row)
                            <tr class="order-handle" data-id="{{ $row->id }}">
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $row->question }}</td>
                                <td>{{ $row->answer }}</td>
                                <td>
                                    <input type="checkbox" class="status-toggle" data-id="{{ $row->id }}"
                                    data-toggle="toggle" data-onlabel="Active" data-offlabel="Inactive"
                                    data-onstyle="success" data-offstyle="danger"  {{ $row->status == 1 ? 'checked' : '' }} >
                                    {{-- @if ($row->status == 1)
                                        <span class="text-success">Active</span>
                                    @else
                                        <span class="text-danger">Inactive</span>
                                    @endif --}}
                                </td>
                                {{-- <td>{{ $row->order_id }}</td> --}}
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary waves-effect waves-light dropdown-toggle"
                                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <button class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#view_modal{{ $row->id }}"
                                                    style="font-size: 16px;"><i
                                                        class="fas fa-eye"></i> View</button>
                                            </li>
                                            <li>
                                                <button class="dropdown-item" style="font-size: 16px;"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#edit_modal{{ $row->id }}"><i
                                                        class='bx bxs-edit text-info'></i>
                                                    Edit</button>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('admin.faq.delete', $row->id) }}"
                                                    style="font-size: 16px;" id="deleteData"><i
                                                        class='bx bxs-trash text-danger'></i> Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="edit_modal{{ $row->id }}" tabindex="-1"
                                aria-labelledby="edit_Label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Faq</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('admin.faq.update', $row->id) }}">
                                                @csrf

                                                <div class="mb-3">
                                                    <label for="up_question" class="form-label">Question <span
                                                            class="text-danger">*</span></label>
                                                    <input name="question" id="up_question"
                                                        placeholder="Write Your Question...." type="text"
                                                        class="form-control" value="{{ $row->question }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="up_answer" class="form-label">Answer <span
                                                            class="text-danger">*</span></label>
                                                    <textarea name="answer" id="up_answer" class="form-control" cols="30" rows="6"
                                                        placeholder="Write Your Answer....">{{ $row->answer }}</textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="up_status" class="form-label">Status <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-control" name="status" id="up_status">
                                                        <option value="1"
                                                            @if ($row->status == 1) selected @endif>Active
                                                        </option>
                                                        <option value="0"
                                                            @if ($row->status == 0) selected @endif>Inactive
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="order_id" class="form-label">Order Id <span
                                                            class="text-danger">*</span></label>
                                                    <input name="order_id" id="order_id" placeholder="Order id...."
                                                        type="number" class="form-control"
                                                        value="{{ $row->order_id }}">
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger waves-effect waves-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit"
                                                        class="btn btn-primary waves-effect waves-light">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- View Modal -->
                            <div class="modal fade" id="view_modal{{ $row->id }}" tabindex="-1"
                                aria-labelledby="edit_lLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">View Faq List</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">

                                            <div class="message_content">
                                                <label>Question : </label>
                                                <span class="text-dark">{{ $row->question }}</span>
                                            </div>

                                            <div class="view_modal_content">
                                                <label>Answer : </label>
                                                <span class="text-dark">{{ $row->answer }}</span>
                                            </div>

                                            <div class="view_modal_content">
                                                <label>Status : </label>
                                                @if ($row->status == 1)
                                                    <span class="text-success">Active</span>
                                                @else
                                                    <span class="text-danger">Inactive</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        {{-- <tr>
                            <th scope="row">2</th>
                            <td>What kind of data is required to train your AI recommendation engine?</td>
                            <td>Our AI recommendation engine thrives on user interaction data, such as browsing history,
                                purchase behavior, and engagement with previous recommendations. For optimal accuracy, it’s best
                                to have anonymized demographic data and past engagement metrics. This allows our algorithms to
                                deliver personalized suggestions that align with each user’s preferences, helping boost
                                conversions.</td>
                            <td>
                                <span class="text-danger">Inactive</span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary waves-effect waves-light dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#view_modal"
                                                style="font-size: 16px;"><i class="fas fa-eye"></i> View</button>
                                        </li>
                                        <li>
                                            <button class="dropdown-item" style="font-size: 16px;" data-bs-toggle="modal"
                                                data-bs-target="#edit_modal"><i class='bx bxs-edit text-info'></i>
                                                Edit</button>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" style="font-size: 16px;"
                                                id="deleteData"><i
                                                    class='bx bxs-trash text-danger'></i> Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">3</th>
                            <td>Can your AI analytics platform integrate with existing CRM systems?</td>
                            <td>Yes, our AI analytics platform is designed to integrate seamlessly with popular CRM systems like
                                Salesforce, HubSpot, and Zoho. Our team can help customize the setup, allowing you to leverage
                                powerful AI-driven insights directly within your existing workflow. This integration can enhance
                                customer profiling, improve lead targeting, and optimize campaign strategies.</td>
                            <td>
                                <span class="text-success">Active</span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary waves-effect waves-light dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#view_modal"
                                                style="font-size: 16px;"><i class="fas fa-eye"></i> View</button>
                                        </li>
                                        <li>
                                            <button class="dropdown-item" style="font-size: 16px;" data-bs-toggle="modal"
                                                data-bs-target="#edit_modal"><i class='bx bxs-edit text-info'></i>
                                                Edit</button>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" style="font-size: 16px;"
                                                id="deleteData"><i class='bx bxs-trash text-danger'></i> Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr> --}}

                    </tbody>
                </table>
            </div>
        </div>
    </div>



    {{-- </div> --}}
@endsection

@push('script')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap5-toggle@5.1.1/js/bootstrap5-toggle.ecmas.min.js"></script>

    <script>
        let table = new DataTable('#datatables', {
            responsive: true
        });

        $(document).ready(function () {
            $('.status-toggle').change(function () {
                let isChecked = $(this).prop('checked') ? 1 : 0;
                let rowId = $(this).data('id');
                console.log(rowId);


                $.ajax({
                    url: "{{ route('admin.faq.toggleStatus') }}",
                    type: "POST",
                    data: {
                        id: rowId,
                        status: isChecked,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        toastr.success(response.message);
                    },
                    error: function () {
                        toastr.error('An error occurred while updating the status.');
                    }
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const sortable = new Sortable(document.getElementById('sortable'), {
                animation: 150, // Smooth animation
                handle: '.order-handle', // Drag handle selector
                onEnd: function (evt) {
                    const order = Array.from(evt.from.children).map((row) => ({
                        id: row.dataset.id,
                        order_id: Array.from(row.parentNode.children).indexOf(row) + 1,
                    }));

                    // Send new order to the server
                    fetch('faq/update-order', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: JSON.stringify(order),
                    })
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.success) {
                            toastr.success('FAQ Order updated successfully!');
                        }else {
                            toastr.error('Failed to update the order.');
                        }
                    })
                    .catch((error) => console.error('Error:', error));
                },
            });
        });

    </script>
@endpush
