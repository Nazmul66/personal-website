    <!-- All Scripts  -->
    <!-- JS -->
    <script src="{{ asset('frontend/js/plugin.js') }}"></script>
    <script src="{{ asset('frontend/js/animation.js') }}"></script>
    <script src="{{ asset('frontend/js/scroll_top.js') }}"></script>

      <!-- toaster Js plugins  -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="{{ asset('frontend/js/main.js') }}"></script>

    @stack('add-js')

    {!! Toastr::message() !!}

    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{!! $error !!}");
            @endforeach
        @endif

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

