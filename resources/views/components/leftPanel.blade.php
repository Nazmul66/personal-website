@php
    $user = Auth::user();
@endphp
<!-- Start Left panel -->
<div class="rbt-left-panel popup-dashboardleft-section">
    <div class="rbt-default-sidebar">
        <div class="inner">
            <div class="content-item-content">
                <div class="rbt-default-sidebar-wrapper">
                    <nav class="mainmenu-nav">

                        <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                            <li><a href="{{ route('user.dashboard.dashboard') }}"><i
                                        class="feather-monitor"></i><span>Dashboard</span></a>
                            </li>
                            <li>
                                <a href="{{ route('user.dashboard.plansBilling') }}">
                                    <i class="feather-briefcase"></i>
                                    <span>Manage Subsription</span>
                                </a>
                            </li>
                        </ul>

                        <div class="rbt-sm-separator"></div>

                        <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                            <li>
                                <a href="{{ route('user.dashboard.textGenerator') }}">
                                    <img class="boxed-logo-dark"
                                        src="{{ asset('assets/images/generator-icon/text.png') }}" alt="AI Generator">
                                    <img class="boxed-logo-light"
                                        src="{{ asset('assets/images/light/generator-icon/text.png') }}"
                                        alt="AI Generator">
                                    <span>Text Generator</span></a>
                            </li>

                            {{-- <li>
                                <a href="{{ route('user.dashboard.imageGenerator') }}"><img class="boxed-logo-dark"
                                        src="{{ asset('assets/images/generator-icon/photo.png') }}"
                                        alt="AI Generator"><img class="boxed-logo-light"
                                        src="{{ asset('assets/images/light/generator-icon/photo.png') }}"
                                        alt="AI Generator"><span>Image Generator</span>
                                    <div class="rainbow-badge-card badge-sm ml--10">NEW</div>
                                </a>
                            </li> --}}

                            <li>
                                <a href="{{ route('user.dashboard.codeGenerator') }}">
                                    <img class="boxed-logo-dark"
                                        src="{{ asset('assets/images/generator-icon/code-editor.png') }}"
                                        alt="AI Generator">
                                    <img class="boxed-logo-light"
                                        src="{{ asset('assets/images/light/generator-icon/code-editor.png') }}"
                                        alt="AI Generator">
                                    <span>Code Generator</span>
                                </a>
                            </li>

                            {{-- <li>
                                <a href="{{ route('user.dashboard.imageEditor') }}">
                                    <img class="boxed-logo-dark" src="{{ asset('assets/images/generator-icon/photo-editor.png') }}"
                                        alt="AI Generator">
                                    <img class="boxed-logo-light" src="{{ asset('assets/images/light/generator-icon/photo-editor.png') }}"
                                        alt="AI Generator">
                                    <span>Image Editor</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('user.dashboard.videoGenerator') }}">
                                    <img class="boxed-logo-dark" src="{{ asset('assets/images/generator-icon/video-camera.png') }}"
                                        alt="AI Generator">
                                    <img class="boxed-logo-light" src="{{ asset('assets/images/light/generator-icon/video-camera.png') }}"
                                        alt="AI Generator">
                                    <span>Vedio Generator</span>
                                </a>
                            </li> --}}

                            <li>
                                <a href="{{ route('user.dashboard.emailGenerator') }}">
                                    <img class="boxed-logo-dark"
                                        src="{{ asset('assets/images/generator-icon/email.png') }}" alt="AI Generator">
                                    <img class="boxed-logo-light"
                                        src="{{ asset('assets/images/light/generator-icon/email.png') }}"
                                        alt="AI Generator">
                                    <span>Email Generator</span>
                                </a>
                            </li>
                            {{-- <li><a tabindex="-1" class="disabled" aria-disabled="true">
                                    <img class="boxed-logo-dark"
                                        src="{{ asset('assets/images/generator-icon/website-design.png') }}"
                                        alt="AI Generator">
                                    <img class="boxed-logo-light"
                                        src="{{ asset('assets/images/light/generator-icon/website-design.png') }}"
                                        alt="AI Generator">
                                    <span>Website Generator</span>
                                    <div class="rainbow-badge-card badge-sm ml--10">PRO</div>
                                </a></li> --}}
                        </ul>
                    </nav>

                    <div class="rbt-sm-separator"></div>

                    <nav class="mainmenu-nav">
                        <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                            <li class="has-submenu">
                                <a class="collapse-btn collapsed" href="{{ route('user.dashboard.profileDetails') }}">
                                    <i class="feather-plus-circle"></i>
                                    <span>Setting</span></a>
                                <div class="collapse" id="collapseExample">
                                    <ul class="submenu rbt-default-sidebar-list">
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
                                        </li> --}}
                                        {{-- <li>
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
                                </div>
                            </li>
                            {{-- <li><a href="{{ route('user.dashboard.help') }}"><i class="feather-award"></i><span>Help &
                                        FAQ</span></a></li> --}}
                        </ul>
                        <div class="rbt-sm-separator"></div>
                        {{-- <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                            <li><a href="{{ route('user.dashboard.releaseNotes') }}"><i
                                        class="feather-bell"></i><span>Release notes</span></a>
                            </li>
                            <li><a href="{{ route('terms.condition') }}"><i
                                        class="feather-briefcase"></i><span>Terms &
                                        Policy</span></a></li>
                        </ul> --}}
                    </nav>
                </div>
            </div>
        </div>
        <div class="subscription-box">
            <div class="inner">
                <a href="{{ route('user.dashboard.profileDetails') }}" class="autor-info">
                    <div class="author-img active">
                        <img class="w-100" src="{{ getPhoto($user->avatar) }}" alt="Author">
                    </div>
                    <div class="author-desc">
                        <h6>{{ $user->name }}</h6>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="author-badge">{{$user->current_pan_id ? $user->userPlan->title : 'Free' }} </div>
                </a>
                <div class="btn-part">
                    <a href="{{ route('pricing') }}" class="btn-default btn-border">Upgrade To Pro</a>
                </div>
            </div>


        </div>
        <p class="subscription-copyright copyright-text text-center b4  small-text">© 2024 <a
                href="{{ url('/') }}">{{ getSetting()->site_name }}</a></p>
    </div>
</div>
<!-- End Left panel -->
