<header class="rbt-dashboard-header rainbow-header header-default header-left-align rbt-fluid-header">
    <div class="container-fluid position-relative">
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-6 col-7">
                <div class="header-left d-flex">
                    <div class="expand-btn-grp">
                        <button class="bg-solid-primary popup-dashboardleft-btn"><i class="feather-sidebar left"></i></button>
                    </div>
                    <div class="logo">
                        <a href="{{ route('index') }}">>
                            <img class="logo-light" src="{{ asset('assets/images/logo/logo.png') }}" alt="Corporate Logo">
                            <img class="logo-dark" src="{{ asset('assets/images/logo/logo-dark.png') }}" alt="Corporate Logo">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-md-6 col-5">
                <div class="header-right">
                    <nav class="mainmenu-nav d-none d-lg-block text-center">
                        <ul class="mainmenu">
                            <li><a href="{{ route('dashboard') }}">>Welcome</a></li>
                            <li class="with-megamenu has-menu-child-item position-relative"><a href="#">Pages</a>
                                <div class="rainbow-megamenu right-align with-mega-item-2 small">
                                    <div class="wrapper p-0">
                                        <div class="row row--0">
                                            <div class="col-lg-12 single-mega-item">
                                                <h3 class="rbt-short-title">Inner Pages</h3>
                                                <ul class="mega-menu-item">
                                                    <li>
                                                        <a href="{{ route('styleGuide') }}">>
                                                            <span>Style Guide</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('blog') }}">>
                                                            <span>Blog</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('blogDetails') }}">>
                                                            <span>Blog Details</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('pricing') }}">>
                                                            <span>Pricing</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('contact') }}">>
                                                            <span>Contact</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('signin') }}">>
                                                            <span>Sign In</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('signup') }}">>
                                                            <span>Sign Up</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('team') }}">>
                                                            <span>Team</span>
                                                        </a>
                                                    </li>
                                                    <li><a href="{{ route('roadmap') }}">>Roadmap</a></li>
                                                    <li><a href="{{ route('utilize') }}">>How to use</a></li>
                                                    <li>
                                                        <a href="{{ route('termsPolicy') }}">>
                                                            <span>Terms & Policy</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('privacyPolicy') }}">>
                                                            <span>Privacy Policy</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="with-megamenu has-menu-child-item position-relative"><a href="#">Dashboard</a>
                                <div class="rainbow-megamenu right-align with-mega-item-2">
                                    <div class="wrapper p-0">
                                        <div class="row row--0">
                                            <div class="col-lg-6 single-mega-item">
                                                <h3 class="rbt-short-title">DASHBOARD PAGES</h3>
                                                <ul class="mega-menu-item">
                                                    <li>
                                                        <a href="{{ route('profileDetails') }}">>
                                                            <span>Profile</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('notification') }}">>
                                                            <span>Notification</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('chatExport') }}">>
                                                            <span>Chat Export</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('appearance') }}">>
                                                            <span>Apperance</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('plansBilling') }}">>
                                                            <span>Plans and Billing</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('sessions') }}">>
                                                            <span>Sessions</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('application') }}">>
                                                            <span>Application</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('releaseNotes') }}">>
                                                            <span>Release notes</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('help') }}">>
                                                            <span>Help & FAQs</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-6 single-mega-item">
                                                <div class="header-menu-img">
                                                    <img src="{{ asset('assets/images/menu-img/menu-img-2.png') }}" alt="Menu Split Image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><a href="{{ route('pricing') }}">>Pricing</a></li>
                            <li><a href="{{ route('signin') }}">>Sign In</a></li>
                        </ul>
                    </nav>

                    <div class="header-btn d-none d-md-block">
                        <a class="btn-default btn-small round" target="_blank" href="{{ asset('plansbilling') }}">>Upgrade <i class="feather-zap"></i></a>
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
                                                            <a href="{{ route('textGenerator') }}"> class="genarator-card bg-flashlight-static center-align">
                                                                <div class="inner bottom-flashlight">
                                                                    <div class="left-align">
                                                                        <div class="img-bar">
                                                                            <img src="{{ asset('assets/images/generator-icon/text_line.png') }}" alt="AI Generator">
                                                                        </div>
                                                                        <h5 class="title">Text Generator</h5>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('vedioGenerator') }}"> class="genarator-card center-align bg-flashlight-static">
                                                                <div class="inner bottom-flashlight">
                                                                    <div class="left-align">
                                                                        <div class="img-bar">
                                                                            <img src="{{ asset('assets/images/generator-icon/video-camera_line.png') }}" alt="AI Generator">
                                                                        </div>
                                                                        <h5 class="title">Vedio Generator</h5>
                                                                    </div>
                                                                </div>
                                                                <span class="rainbow-badge-card">Hot</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('codeGenerator') }}"> class="genarator-card center-align bg-flashlight-static">
                                                                <div class="inner bottom-flashlight">
                                                                    <div class="left-align">
                                                                        <div class="img-bar">
                                                                            <img src="{{ asset('assets/images/generator-icon/code-editor_line.png') }}" alt="AI Generator">
                                                                        </div>
                                                                        <h5 class="title">HTML Generator</h5>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="genarator-card center-align bg-flashlight-static disabled" tabindex="-1">
                                                                <div class="inner bottom-flashlight">
                                                                    <div class="left-align">
                                                                        <div class="img-bar">
                                                                            <img src="{{ asset('assets/images/generator-icon/lyrics_line.png') }}" alt="AI Generator">
                                                                        </div>
                                                                        <h5 class="title">Lyrics Generator</h5>
                                                                    </div>
                                                                </div>
                                                                <span class="rainbow-badge-card">Comming</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 single-mega-item">
                                                <div class="genarator-section">
                                                    <ul class="genarator-card-group full-width-list">
                                                        <li>
                                                            <a href="{{ route('imageEditor') }}"> class="genarator-card center-align bg-flashlight-static">
                                                                <div class="inner bottom-flashlight">
                                                                    <div class="left-align">
                                                                        <div class="img-bar">
                                                                            <img src="{{ asset('assets/images/generator-icon/photo-editor_line.png') }}" alt="AI Generator">
                                                                        </div>
                                                                        <h5 class="title">Photo Editor</h5>
                                                                    </div>
                                                                </div>
                                                                <span class="rainbow-badge-card">Hot</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('imageGenerator') }}"> class="genarator-card center-align bg-flashlight-static">
                                                                <div class="inner bottom-flashlight">
                                                                    <div class="left-align">
                                                                        <div class="img-bar">
                                                                            <img src="{{ asset('assets/images/generator-icon/photo_line.png') }}" alt="AI Generator">
                                                                        </div>
                                                                        <h5 class="title">Image Generator</h5>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('textGenerator') }}"> class="genarator-card center-align bg-flashlight-static">
                                                                <div class="inner bottom-flashlight">
                                                                    <div class="left-align">
                                                                        <div class="img-bar">
                                                                            <img src="{{ asset('assets/images/generator-icon/voice_line.png') }}" alt="AI Generator">
                                                                        </div>
                                                                        <h5 class="title">Speech to text</h5>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="genarator-card center-align bg-flashlight-static disabled" tabindex="-1">
                                                                <div class="inner bottom-flashlight">
                                                                    <div class="left-align">
                                                                        <div class="img-bar">
                                                                            <img src="{{ asset('assets/images/generator-icon/website-design_line.png') }}" alt="AI Generator">
                                                                        </div>
                                                                        <h5 class="title">Website Generator</h5>
                                                                    </div>
                                                                </div>
                                                                <span class="rainbow-badge-card">Comming</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 single-mega-item">
                                                <div class="genarator-section">
                                                    <ul class="genarator-card-group full-width-list">
                                                        <li>
                                                            <a href="{{ route('codeGenerator') }}"> class="genarator-card center-align bg-flashlight-static">
                                                                <div class="inner bottom-flashlight">
                                                                    <div class="left-align">
                                                                        <div class="img-bar">
                                                                            <img src="{{ asset('assets/images/generator-icon/code-editor_line.png') }}" alt="AI Generator">
                                                                        </div>
                                                                        <h5 class="title">Code Generator</h5>
                                                                    </div>
                                                                </div>
                                                                <span class="rainbow-badge-card">Hot</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('emailGenerator') }}"> class="genarator-card center-align bg-flashlight-static">
                                                                <div class="inner bottom-flashlight">
                                                                    <div class="left-align">
                                                                        <div class="img-bar">
                                                                            <img src="{{ asset('assets/images/generator-icon/email_line.png') }}" alt="AI Generator">
                                                                        </div>
                                                                        <h5 class="title">Email Writer</h5>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('textGenerator') }}"> class="genarator-card center-align bg-flashlight-static">
                                                                <div class="inner bottom-flashlight">
                                                                    <div class="left-align">
                                                                        <div class="img-bar">
                                                                            <img src="{{ asset('assets/images/generator-icon/text-voice_line.png') }}" alt="AI Generator">
                                                                        </div>
                                                                        <h5 class="title">Text to speech</h5>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('textGenerator') }}"> class="genarator-card center-align bg-flashlight-static disabled center-align" tabindex="-1">
                                                                <div class="inner bottom-flashlight">
                                                                    <div class="left-align">
                                                                        <div class="img-bar">
                                                                            <img src="{{ asset('assets/images/generator-icon/document_line.png') }}" alt="AI Generator">
                                                                        </div>
                                                                        <h5 class="title">Chat with Documents</h5>
                                                                    </div>
                                                                </div>
                                                                <span class="rainbow-badge-card">Comming</span>
                                                            </a>
                                                        </li>
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
                            <a class="admin-img" href="#"><img src="{{ asset('assets/images/team/team-01.png') }}" alt="Admin"></a>
                        </div>
                        <div class="rbt-user-menu-list-wrapper">
                            <div class="inner">
                                <div class="rbt-admin-profile">
                                    <div class="admin-thumbnail">
                                        <img src="{{ asset('assets/images/team/team-01.png') }}" alt="User Images">
                                    </div>
                                    <div class="admin-info">
                                        <span class="name">Trent Adam</span>
                                        <a class="rbt-btn-link color-primary" href="{{ asset('profiledetails') }}">>View
                                            Profile</a>
                                    </div>
                                </div>
                                <ul class="user-list-wrapper user-nav">
                                    <li>
                                        <a href="{{ route('profileDetails') }}">>
                                            <i class="feather-user"></i>
                                            <span>Profile Details</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('notification') }}">>
                                            <i class="feather-shopping-bag"></i>
                                            <span>Notification</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('chatExport') }}">>
                                            <i class="feather-users"></i>
                                            <span>Chat Export</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('appearance') }}">>
                                            <i class="feather-home"></i>
                                            <span>Apperance</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('plansBilling') }}">>
                                            <i class="feather-briefcase"></i>
                                            <span>Plans and Billing</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('sessions') }}">>
                                            <i class="feather-users"></i>
                                            <span>Sessions</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('application') }}">>
                                            <i class="feather-list"></i>
                                            <span>Application</span>
                                        </a>
                                    </li>
                                </ul>
                                <hr class="mt--10 mb--10">
                                <ul class="user-list-wrapper user-nav">
                                    <li>
                                        <a href="#">
                                            <i class="feather-help-circle"></i>
                                            <span>Help Center</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('profileDetails') }}">>
                                            <i class="feather-settings"></i>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                </ul>
                                <hr class="mt--10 mb--10">
                                <ul class="user-list-wrapper">
                                    <li>
                                        <a href="{{ route('signin') }}">>
                                            <i class="feather-log-out"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Start admin Area  -->

                    <div class="expand-btn-grp @@display-class">
                        <button class="bg-solid-primary popup-dashboardright-btn"><i class="feather-sidebar right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>