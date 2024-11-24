<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-style-mode" content="1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@stack('meta-data') || CreaftedFate</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/CraftedFate.png') }}">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <?php echo isset($css) ? $css : ''; ?>
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/feature.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/magnify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/prism.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v=1.2">

    <!-- toaster css plugin -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        .toast-message {
            font-size: 12px;
        }
        .toast-title {
            font-size: 14px;
        }
        .swiper {
        width: 100%;
        height: 100%;
        }
        .ribbon {
            position: absolute;
            top: 27px;
            right: -58px;
            background-color: #ff4757;
            color: #fff;
            padding: 3px 55px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            z-index: 10;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
            transform: rotate(45deg);
        }


    </style>
    @stack('add-css')
</head>
