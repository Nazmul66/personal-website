<div class="popup-mobile-menu">
        <div class="inner-popup">
            <div class="header-top">
                <div class="logo">
                    <a href="{{ route('index') }}">
                        <img class="logo-light" src="{{ asset('assets/images/logo/logo.png') }}" alt="Corporate Logo">
                        <img class="logo-dark" src="{{ asset('assets/images/logo/logo-dark.png') }}" alt="Corporate Logo">
                    </a>
                </div>
                <div class="close-menu">
                    <button class="close-button">
                        <i class="feather-x"></i>
                    </button>
                </div>
            </div>

            <div class="content">
                <ul class="mainmenu">
                    <li><a href="{{ route('dashboard') }}">Welcome</a></li>
                    <li class="with-megamenu has-menu-child-item position-relative"><a href="#">Dashboard</a>
                        <div class="rainbow-megamenu right-align with-mega-item-2">
                            <div class="wrapper p-0">
                                <div class="row row--0">
                                    <div class="col-lg-6 single-mega-item">
                                        <h3 class="rbt-short-title">DASHBOARD PAGES</h3>
                                        <ul class="mega-menu-item">
                                            <li>
                                                <a href="{{ route('profileDetails') }}">
                                                    <span>Profile</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('notification') }}">
                                                    <span>Notification</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('chatExport') }}">
                                                    <span>Chat Export</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('appearance') }}">
                                                    <span>Apperance</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('plansBilling') }}">
                                                    <span>Plans and Billing</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('sessions') }}">
                                                    <span>Sessions</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('application') }}">
                                                    <span>Application</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('releaseNotes') }}">
                                                    <span>Release notes</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('help') }}">
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
                    <li><a href="{{ route('pricing') }}">Pricing</a></li>
                    <li><a href="{{ route('signin') }}">Sign In</a></li>
                </ul>








                <div class="rbt-sm-separator"></div>
                <div class="rbt-default-sidebar-wrapper">
                    <nav class="mainmenu-nav">
                        <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                            <li><a href="{{ route('dashboard') }}"><i class="feather-monitor"></i><span>Welcome</span></a></li>
                            <li><a href="{{ route('plansBilling') }}"><i class="feather-briefcase"></i><span>Manage Subsription</span></a></li>
                        </ul>
                        <div class="rbt-sm-separator"></div>
                        <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                            <li><a href="{{ route('textGenerator') }}"><img src="{{ asset('assets/images/generator-icon/text.png') }}" alt="AI Generator"><span>Text Generator</span></a></li>
                            <li><a href="{{ route('imageGenerator') }}"><img src="{{ asset('assets/images/generator-icon/photo.png') }}" alt="AI Generator"><span>Image Generator</span>
                                    <div class="rainbow-badge-card badge-sm ml--10">Hot</div>
                                </a></li>
                            <li><a href="{{ route('codeGenerator') }}"><img src="{{ asset('assets/images/generator-icon/code-editor.png') }}" alt="AI Generator"><span>Code Generator</span></a></li>
                            <li><a href="{{ route('imageEditor') }}"><img src="{{ asset('assets/images/generator-icon/photo-editor.png') }}" alt="AI Generator"><span>Image Editor</span></a></li>
                            <li><a href="{{ route('vedioGenerator') }}"><img src="{{ asset('assets/images/generator-icon/video-camera.png') }}" alt="AI Generator"><span>Vedio Generator</span></a></li>
                            <li><a href="{{ route('emailGenerator') }}"><img src="{{ asset('assets/images/generator-icon/email.png') }}" alt="AI Generator"><span>Email Generator</span></a></li>
                            <li><a tabindex="-1" class="disabled" aria-disabled="true" role="button"><img src="{{ asset('assets/images/generator-icon/website-design.png') }}" alt="AI Generator"><span>Website Generator</span></a></li>
                        </ul>
                    </nav>

                    <div class="rbt-sm-separator"></div>

                    <nav class="mainmenu-nav">
                        <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                            <li class="has-submenu"><a class="collapse-btn collapsed" data-bs-toggle="collapse" href="#collapseExampleMenu" role="button" aria-expanded="false" aria-controls="collapseExampleMenu"><i class="feather-plus-circle"></i><span>Setting</span></a>
                                <div class="collapse" id="collapseExampleMenu">
                                    <ul class="submenu rbt-default-sidebar-list">
                                        <li>
                                            <a href="{{ route('profileDetails') }}">
                                                <i class="feather-user"></i>
                                                <span>Profile Details</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('notification') }}">
                                                <i class="feather-shopping-bag"></i>
                                                <span>Notification</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('chatExport') }}">
                                                <i class="feather-users"></i>
                                                <span>Chat Export</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('appearance') }}">
                                                <i class="feather-home"></i>
                                                <span>Apperance</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('plansBilling') }}">
                                                <i class="feather-briefcase"></i>
                                                <span>Plans and Billing</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('sessions') }}">
                                                <i class="feather-users"></i>
                                                <span>Sessions</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('application') }}">
                                                <i class="feather-list"></i>
                                                <span>Application</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="#"><i class="feather-award"></i><span>Help & FAQ</span></a></li>
                        </ul>
                        <div class="rbt-sm-separator"></div>
                        <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                            <li><a href="{{ route('releaseNotes') }}"><i class="feather-bell"></i><span>Release notes</span></a></li>
                            <li><a href="{{ route('termsPolicy') }}"><i class="feather-briefcase"></i><span>Terms & Policy</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- Start Header Btn  -->
            <div class="header-btn d-block d-md-none">
                <a class="btn-default @@btnClass" target="_blank" href="{{ asset('textgenerator') }}">Get Started Free</a>
            </div>
            <!-- End Header Btn  -->
        </div>
    </div>