@php
    $user = Auth::user();
    $headerMenus = DB::table('custom_pages')->where('menu_type', '1')->where('is_active', '1')->orderBy('order_id', 'desc')->get();
@endphp
<header class="rbt-dashboard-header rainbow-header header-default header-left-align rbt-fluid-header">
    <div class="container-fluid position-relative">
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-6 col-7">
                <div class="header-left d-flex">
                    <div class="expand-btn-grp">
                        <button class="bg-solid-primary popup-dashboardleft-btn"><i
                                class="feather-sidebar left"></i></button>
                    </div>
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <img class="logo-light" src="{{ asset(getSetting()->site_logo) }}" alt="Corporate Logo">
                            <img class="logo-dark" src="{{ asset(getSetting()->site_logo) }}" alt="Corporate Logo">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-md-6 col-5">
                <div class="header-right">
                    <nav class="mainmenu-nav d-none d-lg-block text-center">
                        <ul class="mainmenu">
                            {{-- <li><a href="{{ route('dashboard') }}">Welcome</a></li> --}}
                            {{-- <li class="with-megamenu has-menu-child-item position-relative"><a href="#">Pages</a>
                                <div class="rainbow-megamenu right-align with-mega-item-2 small">
                                    <div class="wrapper p-0">
                                        <div class="row row--0">
                                            <div class="col-lg-12 single-mega-item">
                                                <h3 class="rbt-short-title">Inner Pages</h3>
                                                <ul class="mega-menu-item">
                                                    <li>
                                                        <a href="{{ route('styleGuide') }}">
                                                            <span>Style Guide</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('blog') }}">
                                                            <span>Blog</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('blogDetails') }}">
                                                            <span>Blog Details</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('pricing') }}">
                                                            <span>Pricing</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('contact') }}">
                                                            <span>Contact</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('/login') }}">
                                                            <span>Sign In</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('signup') }}">
                                                            <span>Sign Up</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('team') }}">
                                                            <span>Team</span>
                                                        </a>
                                                    </li>
                                                    <li><a href="{{ route('roadmap') }}">Roadmap</a></li>
                                                    <li><a href="{{ route('about') }}">How to use</a></li>
                                                    <li>
                                                        <a href="{{ route('terms.condition') }}">
                                                            <span>Terms & Policy</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('privacy.policy') }}">
                                                            <span>Privacy Policy</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li> --}}
                            @if($headerMenus->count() > 0)
                                @foreach ($headerMenus as $item)
                                <li><a href="{{ route('customPage', $item->url_slug) }}">{{$item->title}}</a></li>
                                @endforeach
                            @endif
                            <li class="with-megamenu has-menu-child-item position-relative">
                                @auth
                                    <a href="{{ route('user.dashboard.dashboard') }}">Dashboard</a>
                                @else
                                    <a href="{{ route('index') }}">Home</a>
                                @endauth
                                {{-- <div class="rainbow-megamenu right-align with-mega-item-2">
                                    <div class="wrapper p-0">
                                        <div class="row row--0">
                                            <div class="col-lg-6 single-mega-item">
                                                <h3 class="rbt-short-title">DASHBOARD PAGES</h3>
                                                <ul class="mega-menu-item">
                                                    <li>
                                                        <a href="{{ route('user.dashboard.profileDetails') }}">
                                                            <span>Profile</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('user.dashboard.notification') }}">
                                                            <span>Notification</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('user.dashboard.chatExport') }}">
                                                            <span>Chat Export</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('user.dashboard.appearance') }}">
                                                            <span>Apperance</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('user.dashboard.plansBilling') }}">
                                                            <span>Plans and Billing</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('user.dashboard.sessions') }}">
                                                            <span>Sessions</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('user.dashboard.application') }}">
                                                            <span>Application</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('user.dashboard.releaseNotes') }}">
                                                            <span>Release notes</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('user.dashboard.help') }}">
                                                            <span>Help & FAQs</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-6 single-mega-item">
                                                <div class="header-menu-img">
                                                    <img src="{{ asset('assets/images/menu-img/menu-img-2.png') }}"
                                                        alt="Menu Split Image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </li>
                            <li>
                                <a href="{{ route('pricing') }}">Pricing</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <form action="{{ route('user.logout') }}" method="POST">
                                        @csrf
                                        <button class="logout_btn" type="submit"
                                            style="border: none; padding: 0; background: none;">
                                            Log Out
                                        </button>
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <div class="header-btn d-none d-md-block">
                        <a class="btn-default btn-small round" href="{{ route('pricing') }}">Upgrade <i
                                class="feather-zap"></i></a>
                    </div>

                    <!-- Start Mobile-Menu-Bar -->
                    <div class="mobile-menu-bar mr--10 ml--10 d-block d-lg-none">
                        <div class="hamberger">
                            <button class="hamberger-button">
                                <i class="feather-menu"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Start Mobile-Menu-Bar -->

                    <!-- Start Tools Area -->
                    <div class="mainmenu-nav d-none d-lg-block one-menu">
                        <ul class="mainmenu one-menu-item">
                            <li class="with-megamenu has-menu-child-item position-relative menu-item-open">
                                <a class="header-round-btn" href="#">
                                    <span><i class="feather-grid"></i></span>
                                </a>
                                <div class="rainbow-megamenu with-mega-item-2 right-align">
                                    <div class="wrapper">
                                        <div class="row row--0">
                                            <div class="col-lg-4 single-mega-item">
                                                <div class="genarator-section">
                                                    <ul class="genarator-card-group full-width-list">
                                                        <li>
                                                            <a href="{{ route('user.dashboard.textGenerator') }}"
                                                                class="genarator-card bg-flashlight-static center-align">
                                                                <div class="inner bottom-flashlight">
                                                                    <div class="left-align">
                                                                        <div class="img-bar">
                                                                            <img src="{{ asset('assets/images/generator-icon/text_line.png') }}"
                                                                                alt="AI Generator">
                                                                        </div>
                                                                        <h5 class="title">Text Generator</h5>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>

                                                        {{-- <li>
                                                            <a href="{{ route('user.dashboard.videoGenerator') }}"
                                                                class="genarator-card center-align bg-flashlight-static">
                                                                <div class="inner bottom-flashlight">
                                                                    <div class="left-align">
                                                                        <div class="img-bar">
                                                                            <img src="{{ asset('assets/images/generator-icon/video-camera_line.png') }}"
                                                                                alt="AI Generator">
                                                                        </div>
                                                                        <h5 class="title">Vedio Generator</h5>
                                                                    </div>
                                                                </div>
                                                                <span class="rainbow-badge-card">Hot</span>
                                                            </a>
                                                        </li> --}}

                                                        {{-- <li>
                                                            <a href="{{ route('user.dashboard.codeGenerator') }}"
                                                                class="genarator-card center-align bg-flashlight-static">
                                                                <div class="inner bottom-flashlight">
                                                                    <div class="left-align">
                                                                        <div class="img-bar">
                                                                            <img src="{{ asset('assets/images/generator-icon/code-editor_line.png') }}"
                                                                                alt="AI Generator">
                                                                        </div>
                                                                        <h5 class="title">HTML Generator</h5>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li> --}}

                                                        {{-- <li>
                                                            <a href="#"
                                                                class="genarator-card center-align bg-flashlight-static disabled"
                                                                tabindex="-1">
                                                                <div class="inner bottom-flashlight">
                                                                    <div class="left-align">
                                                                        <div class="img-bar">
                                                                            <img src="{{ asset('assets/images/generator-icon/lyrics_line.png') }}"
                                                                                alt="AI Generator">
                                                                        </div>
                                                                        <h5 class="title">Lyrics Generator</h5>
                                                                    </div>
                                                                </div>
                                                                <span class="rainbow-badge-card">Comming</span>
                                                            </a>
                                                        </li> --}}

                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 single-mega-item">
                                                <div class="genarator-section">
                                                    <ul class="genarator-card-group full-width-list">

                                                        <li>
                                                            <a href="{{ route('user.dashboard.codeGenerator') }}"
                                                                class="genarator-card center-align bg-flashlight-static">
                                                                <div class="inner bottom-flashlight">
                                                                    <div class="left-align">
                                                                        <div class="img-bar">
                                                                            <img src="{{ asset('assets/images/generator-icon/code-editor_line.png') }}"
                                                                                alt="AI Generator">
                                                                        </div>
                                                                        <h5 class="title">Code Generator</h5>
                                                                    </div>
                                                                </div>
                                                                {{-- <span class="rainbow-badge-card">Hot</span> --}}
                                                            </a>
                                                        </li>

                                                        {{-- <li>
                                                            <a href="{{ route('user.dashboard.imageEditor') }}"
                                                                class="genarator-card center-align bg-flashlight-static">
                                                                <div class="inner bottom-flashlight">
                                                                    <div class="left-align">
                                                                        <div class="img-bar">
                                                                            <img src="{{ asset('assets/images/generator-icon/photo-editor_line.png') }}"
                                                                                alt="AI Generator">
                                                                        </div>
                                                                        <h5 class="title">Photo Editor</h5>
                                                                    </div>
                                                                </div>
                                                                <span class="rainbow-badge-card">Hot</span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="{{ route('user.dashboard.imageGenerator') }}"
                                                                class="genarator-card center-align bg-flashlight-static">
                                                                <div class="inner bottom-flashlight">
                                                                    <div class="left-align">
                                                                        <div class="img-bar">
                                                                            <img src="{{ asset('assets/images/generator-icon/photo_line.png') }}"
                                                                                alt="AI Generator">
                                                                        </div>
                                                                        <h5 class="title">Image Generator</h5>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="{{ route('user.dashboard.textGenerator') }}"
                                                                class="genarator-card center-align bg-flashlight-static">
                                                                <div class="inner bottom-flashlight">
                                                                    <div class="left-align">
                                                                        <div class="img-bar">
                                                                            <img src="{{ asset('assets/images/generator-icon/voice_line.png') }}"
                                                                                alt="AI Generator">
                                                                        </div>
                                                                        <h5 class="title">Speech to text</h5>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#"
                                                                class="genarator-card center-align bg-flashlight-static disabled"
                                                                tabindex="-1">
                                                                <div class="inner bottom-flashlight">
                                                                    <div class="left-align">
                                                                        <div class="img-bar">
                                                                            <img src="{{ asset('assets/images/generator-icon/website-design_line.png') }}"
                                                                                alt="AI Generator">
                                                                        </div>
                                                                        <h5 class="title">Website Generator</h5>
                                                                    </div>
                                                                </div>
                                                                <span class="rainbow-badge-card">Comming</span>
                                                            </a>
                                                        </li> --}}
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 single-mega-item">
                                                <div class="genarator-section">
                                                    <ul class="genarator-card-group full-width-list">

                                                        <li>
                                                            <a href="{{ route('user.dashboard.emailGenerator') }}"
                                                                class="genarator-card center-align bg-flashlight-static">
                                                                <div class="inner bottom-flashlight">
                                                                    <div class="left-align">
                                                                        <div class="img-bar">
                                                                            <img src="{{ asset('assets/images/generator-icon/email_line.png') }}"
                                                                                alt="AI Generator">
                                                                        </div>
                                                                        <h5 class="title">Email Writer</h5>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>

                                                        {{-- <li>
                                                            <a href="{{ route('user.dashboard.textGenerator') }}"
                                                                class="genarator-card center-align bg-flashlight-static">
                                                                <div class="inner bottom-flashlight">
                                                                    <div class="left-align">
                                                                        <div class="img-bar">
                                                                            <img src="{{ asset('assets/images/generator-icon/text-voice_line.png') }}"
                                                                                alt="AI Generator">
                                                                        </div>
                                                                        <h5 class="title">Text to speech</h5>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li> --}}

                                                        {{-- <li>
                                                            <a href="{{ route('user.dashboard.textGenerator') }}"
                                                                class="genarator-card center-align bg-flashlight-static disabled center-align"
                                                                tabindex="-1">
                                                                <div class="inner bottom-flashlight">
                                                                    <div class="left-align">
                                                                        <div class="img-bar">
                                                                            <img src="{{ asset('assets/images/generator-icon/document_line.png') }}"
                                                                                alt="AI Generator">
                                                                        </div>
                                                                        <h5 class="title">Chat with Documents</h5>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li> --}}
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- End Tools Area -->

                    <!-- Start admin Area  -->
                    <div class="account-access rbt-user-wrapper right-align-dropdown">
                        <div class="rbt-user ml--0">
                            <a class="admin-img" href="#"><img
                                    src="{{ getPhoto($user->avatar) }}" alt="Admin"></a>
                        </div>
                        <div class="rbt-user-menu-list-wrapper">
                            <div class="inner">
                                <div class="rbt-admin-profile">
                                    <div class="admin-thumbnail">
                                        <img src="{{ getPhoto($user->avatar) }}" alt="Image">
                                    </div>
                                    <div class="admin-info">
                                        <span class="name">{{ $user->name }}</span>
                                        <a class="rbt-btn-link color-primary"
                                            href="{{ route('user.dashboard.profileDetails') }}">View
                                            Profile</a>
                                    </div>
                                </div>
                                <ul class="user-list-wrapper user-nav">
                                    <li>
                                        <a href="{{ route('user.dashboard.profileDetails') }}">
                                            <i class="feather-user"></i>
                                            <span>Profile Details</span>
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a href="{{ route('user.dashboard.notification') }}">
                                            <i class="feather-shopping-bag"></i>
                                            <span>Notification</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.dashboard.chatExport') }}">
                                            <i class="feather-users"></i>
                                            <span>Chat Export</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.dashboard.appearance') }}">
                                            <i class="feather-home"></i>
                                            <span>Apperance</span>
                                        </a>
                                    </li> --}}
                                    <li>
                                        <a href="{{ route('user.dashboard.plansBilling') }}">
                                            <i class="feather-briefcase"></i>
                                            <span>Plans and Billing</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('user.dashboard.profileDetails') }}">
                                            <i class="feather-settings"></i>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('user.logout') }}">
                                            @csrf
                                            <button class="side_panel_logout">
                                                <i class="feather-log-out me-3"></i>
                                                <span>Logout</span>
                                            </button>
                                        </form>
                                    </li>
                                    {{-- <li>
                                        <a href="{{ route('user.dashboard.sessions') }}">
                                            <i class="feather-users"></i>
                                            <span>Sessions</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.dashboard.application') }}">
                                            <i class="feather-list"></i>
                                            <span>Application</span>
                                        </a>
                                    </li> --}}
                                </ul>
                                {{-- <hr class="mt--10 mb--10">
                                <ul class="user-list-wrapper user-nav"> --}}
                                {{-- <li>
                                        <a href="#">
                                            <i class="feather-help-circle"></i>
                                            <span>Help Center</span>
                                        </a>
                                    </li> --}}
                                {{-- <li>
                                        <a href="{{ route('user.dashboard.profileDetails') }}">
                                            <i class="feather-settings"></i>
                                            <span>Settings</span>
                                        </a>
                                    </li> --}}
                                </ul>
                                {{-- <hr class="mt--10 mb--10">
                                <ul class="user-list-wrapper">
                                    <li>
                                        <a href="{{ url('/login') }}">
                                            <i class="feather-log-out"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                    <!-- Start admin Area  -->

                    <div
                        class="expand-btn-grp {{ $toggle == 'true' ? '@@display-class' : 'd-none' }}">
                        <button class="bg-solid-primary popup-dashboardright-btn"><i
                                class="feather-sidebar right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
