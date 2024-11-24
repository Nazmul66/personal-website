<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-style-mode" content="1"> <!-- 0 == light, 1 == dark -->

    <title> <?php echo $headTitle; ?> || CraftedFate</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/CraftedFate.png') }}">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <?php echo isset($css) ? $css : ''; ?>
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/feature.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/magnify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/lightbox.css') }}">

    <!-- toaster css plugin -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/prism.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v=1.2">
    <link rel="stylesheet" href="{{ asset('adminpanel/build/libs/toastr/build/toastr.min.css') }}">

    @stack('css')

    <style>
        .signup-area {
            min-height: 50vh;
            height: auto;
        }

        .header-default .logo a img {
            max-height: 75px !important;
        }

        .logout_btn {
            color: #ccceef;
            font-size: 16px;
            font-weight: 500;
            padding: 0 17px;
            display: block;
            height: 80px;
            line-height: 80px;
            transition: 0.3s;
        }

        .logout_btn:hover {
            color: #FF3BD4 !important;
        }

        .side_panel_logout {
            display: flex;
            padding: 5px 12px;
            align-items: center;
            border-radius: 3px;
            color: #7376aa !important;
            border: none;
            font-size: 16px;
            background: transparent !important;
        }

        .contact-form-1 .form-group input {
            height: 50px !important;
            padding: 0 20px;
        }
        .toast-message {
            font-size: 12px;
        }
        .toast-title {
            font-size: 14px;
        }
        .pricing_price{
            font-size: 60px !important;
        }
        .active-light-mode .table-dark-body tr td{
            color: #000 !important;
        }
        .active-dark-mode .table-dark-body tr td{
            color: #fff !important;
        }
        .active-light-mode .table-dark-body tr th{
            color: #000 !important;
        }
        .active-dark-mode .table-dark-body tr th{
            color: #fff !important;
        }
        @media screen and (min-width:992px) {
            .invoice_header {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }
            .header_left{
                width:50%;
            }
        }
        .table-dark-body th,
        .table-dark-body td {
            border: #3e3434 1px solid !important;
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
</head>
