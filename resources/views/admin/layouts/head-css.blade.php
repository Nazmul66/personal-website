<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!-- Box Icon Css -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<!-- Bootstrap Css -->
<link href="{{ asset('adminpanel/build/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
<!-- App Css-->
<link href="{{ asset('adminpanel/build/css/app.min.css') }}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

<!-- App js -->
{{-- <script src="{{ asset('adminpanel/build/js/plugin.js') }}"></script> --}}

<link href="{{ asset('adminpanel/build/css/custom.css') }}" rel="stylesheet" type="text/css">
</link>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- toaster css plugin -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<style>
    body[data-bs-theme="light"] .dt-input {
        background-color: #ffffff !important;
        color: #000 !important;
    }

    /* Dark Theme (data-layout-mode="dark") */
    html[data-bs-theme="dark"] .dt-input {
        background-color: #2a3042 !important;
        color: #a6b0cb !important;
    }

    html[data-bs-theme="dark"] .dt-input,
    select {
        caret-color: #fff !important;
    }

    html[data-bs-theme="dark"] .ck.ck-list {
        background: #2a3042;
    }

    html[data-bs-theme="dark"] .ck-reset_all :not(.ck-reset_all-excluded *),
    .ck.ck-reset_all {
        color: #ffffff !important;
        box-shadow: none;
        outline: none;
    }

    html[data-bs-theme="dark"] .ck.ck-button:not(.ck-disabled):hover,
    a.ck.ck-button:not(.ck-disabled):hover {
        background: #2a3042 !important;
    }

    html[data-bs-theme="dark"] .ck.ck-button:not(.ck-disabled):active,
    a.ck.ck-button:not(.ck-disabled):active {
        background: #2a3042 !important;
    }

    body div.dt-container .dt-paging .dt-paging-button.disabled {
        color: #6c757d !important;
        pointer-events: none !important;
        cursor: auto !important;
        background-color: #fff !important;
        border-color: #dee2e6 !important;
    }

    [data-bs-theme="dark"] .ck.ck-dropdown .ck-button.ck-dropdown__button:focus,
    [data-bs-theme="dark"] .ck.ck-dropdown .ck-button.ck-dropdown__button:hover,
    [data-bs-theme="dark"] .ck.ck-dropdown .ck-button.ck-dropdown__button:active {
        background-color: #2a3042 !important;
        box-shadow: none !important;
        border-color: #2a3042 !important;
    }

    [data-bs-theme="dark"] .ck.ck-dropdown .ck-button.ck-dropdown__button {
        background: #2a3042 !important;
    }

    .ck.ck-dropdown .ck-button.ck-dropdown__button {
        background: #ffffff !important;
        box-shadow: none !important;
    }

    [data-bs-theme="dark"] .ck.ck-list__item .ck-button.ck-on {
        background: #2977ff !important;
    }

    [data-bs-theme="dark"] .ck.ck-dropdown .ck-dropdown__panel .ck-list .ck-list__item .ck-button:hover {
        background: #2977ff !important;
    }

    .ck.ck-list__item .ck-button.ck-on {
        background: #dddddd !important;
        color: #212121 !important;
    }

    .ck.ck-dropdown .ck-dropdown__panel .ck-list .ck-list__item .ck-button:hover {
        background: #dddddd !important;
        color: #212121 !important;
    }
</style>

@stack('css')
