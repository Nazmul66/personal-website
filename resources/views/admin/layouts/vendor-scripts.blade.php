<!-- JAVASCRIPT -->
<script src="{{ asset('adminpanel/build/libs/jquery/jquery.min.js') }}"></script>
{{-- <script src="{{ asset('adminpanel/build/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<!-- toaster Js plugins  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="{{ asset('adminpanel/build/js/plugin.js') }}"></script>

<script src="{{ asset('adminpanel/build/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('adminpanel/build/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('adminpanel/build/libs/node-waves/waves.min.js') }}"></script>
<script>
    $('#change-password').on('submit', function(event) {
        event.preventDefault();
        var Id = $('#data_id').val();
        var current_password = $('#current-password').val();
        var password = $('#password').val();
        var password_confirm = $('#password-confirm').val();
        $('#current_passwordError').text('');
        $('#passwordError').text('');
        $('#password_confirmError').text('');
        $.ajax({
            url: "{{ url('update-password') }}" + "/" + Id,
            type: "POST",
            data: {
                "current_password": current_password,
                "password": password,
                "password_confirmation": password_confirm,
                "_token": "{{ csrf_token() }}",
            },
            success: function(response) {
                $('#current_passwordError').text('');
                $('#passwordError').text('');
                $('#password_confirmError').text('');
                if (response.isSuccess == false) {
                    $('#current_passwordError').text(response.Message);
                } else if (response.isSuccess == true) {
                    setTimeout(function() {
                        window.location.href = "{{ route('index') }}";
                    }, 1000);
                }
            },
            error: function(response) {
                $('#current_passwordError').text(response.responseJSON.errors.current_password);
                $('#passwordError').text(response.responseJSON.errors.password);
                $('#password_confirmError').text(response.responseJSON.errors
                    .password_confirmation);
            }
        });
    });
</script>




<!-- App js -->
<script src="{{ asset('adminpanel/build/js/app.js') }}"></script>

@stack('script')
{{-- @yield('script-bottom') --}}

{!! Toastr::message() !!}


<script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{!! $error !!}");
        @endforeach
    @endif

    $(document).on("click", "#deleteData", function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: "Are you want to delete?",
            text: "Once Delete, This will be Permanently Delete!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#8bc34a',
            cancelButtonColor: '#d33',
            cancelButtonText: "Cancel",
            confirmButtonText: "Yes, delete it",
        }).then((willDelete) => {
            if (willDelete.isConfirmed) {
                window.location.href = link;
            }
        })
    })
    $(document).on("click", "#cancelbtn", function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: "Are you want to cancel this Transaction?",
            text: "Once canceled, the transaction cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#8bc34a',
            cancelButtonColor: '#d33',
            cancelButtonText: "Cancel",
            confirmButtonText: "Yes, Cancel Transaction",
        }).then((willDelete) => {
            if (willDelete.isConfirmed) {
                window.location.href = link;
            }
        })
    })
</script>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
