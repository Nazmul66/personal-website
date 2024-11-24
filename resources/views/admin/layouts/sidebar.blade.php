<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                {{-- <li class="menu-title" key="t-menu">@lang('translation.Menu')</li> --}}

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">@lang('translation.Dashboards')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="index" key="t-default">@lang('translation.Default')</a></li>
                        <li><a href="dashboard-saas" key="t-saas">@lang('translation.Saas')</a></li>
                        <li><a href="dashboard-crypto" key="t-crypto">@lang('translation.Crypto')</a></li>
                        <li><a href="dashboard-blog" key="t-blog">@lang('translation.Blog')</a></li>
                        <li><a href="dashboard-job">@lang('translation.Jobs')</a></li>
                    </ul>
                </li> --}}
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboard">@lang('translation.Dashboard')</span>
                    </a>
                </li>
                
                @if (Auth::user()->can('admin.customer.index'))
                    <li class="@yield('customer')">
                        <a href="{{ route('admin.customer.index') }}" class="waves-effect">
                            <i class='bx bxs-user'></i>
                            <span key="t-contacts">Customer</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->can('admin.subscription.index'))
                <li>
                    <a href="{{ route('admin.subscription.index') }}" class="waves-effect">
                        <i class='bx bxs-purchase-tag'></i>
                        <span key="t-contacts">Subscriptions</span>
                    </a>
                </li>
                @endif

                @if (Auth::user()->can('admin.contact.index'))
                <li>
                    <a href="{{ route('admin.contact.index') }}" class="waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span key="t-contacts">Contacts</span>
                    </a>
                </li>
                @endif

                @if (Auth::user()->can('admin.faq.index'))
                <li>
                    <a href="{{ route('admin.faq.index') }}" class="waves-effect">
                        <i class="mdi mdi-comment-question-outline"></i>
                        <span key="t-faqs">@lang('translation.FAQs')</span>
                    </a>
                </li>
                @endif


                @if (Auth::user()->can('admin.brand.index'))
                <li>
                    <a href="{{ route('admin.brand.index') }}" class="waves-effect">
                        <i class='bx bx-cube-alt'></i>
                        <span key="t-brands">Brand</span>
                    </a>
                </li>
                @endif

                @if (Auth::user()->can('admin.banner.index') ||
                    Auth::user()->can('admin.content-generator.index') ||
                    Auth::user()->can('admin.how-works.index') ||
                    Auth::user()->can('admin.about.index') ||
                    Auth::user()->can('admin.promotions.index'))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-code-alt"></i>
                        <span key="t-section">@lang('translation.manage_sections')</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        
                        @if (Auth::user()->can('admin.banner.index'))
                        <li>
                            <a href="{{ route('admin.banner.index') }}" class="waves-effect">
                                <span key="t-contacts">Banner</span>
                            </a>
                        </li>
                        @endif
                        @if (Auth::user()->can('admin.content-generator.index'))
                        <li class="@yield('content_generator')">
                            <a href="{{ route('admin.content-generator.index') }}" class="waves-effect">
                                <span key="t-Content">Content Generation</span>
                            </a>
                        </li>
                        @endif
                        @if (Auth::user()->can('admin.how-works.index'))
                        <li class="@yield('how_works')">
                            <a href="{{ route('admin.how-works.index') }}" class="waves-effect">
                                <span key="t-contacts">How it works</span>
                            </a>
                        </li>
                        @endif
                        @if (Auth::user()->can('admin.about.index'))
                        <li>
                            <a href="{{ route('admin.about.index') }}" class="waves-effect">
                                <span key="t-contacts">About Section</span>
                            </a>
                        </li>
                        @endif
                        @if (Auth::user()->can('admin.promotions.index'))
                        <li class="@yield('promotions')">
                            <a href="{{ route('admin.promotions.index') }}" class="waves-effect">
                                <span key="t-contacts">Promotion Section</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                @if (Auth::user()->can('admin.cpage.index'))
                <li class="@yield('cpage_list')">
                    <a href="{{ route('admin.cpage.index') }}" class="waves-effect">
                        <i class='bx bx-window-alt'></i>
                        <span key="t-section">Custom Pages</span>
                    </a>
                </li>
                @endif

                @if (Auth::user()->can('admin.settings.index'))
                <li>
                    <a href="{{ route('admin.setting.general.setting') }}" class="waves-effect">
                        <i class='bx bx-cog'></i>
                        <span key="t-section">settings</span>
                    </a>
                </li>
                @endif

                @if (Auth::user()->can('admin.roles.index') ||
                    Auth::user()->can('admin.admin.index'))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-user-shield"></i>
                        <span key="t-section">Admin & Roles</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if (Auth::user()->can('admin.roles.index'))
                        <li class="@yield('roles')"><a href="{{ route('admin.roles.index') }}"
                                key="">Roles</a></li>
                        @endif
                        @if (Auth::user()->can('admin.admin.index'))
                        <li class="@yield('admin-role')"><a href="{{ route('admin.admin.index') }}"
                                key="">Admins</a></li>
                        @endif
                    </ul>
                </li>
                @endif

                <li>
                    <a href="{{ route('admin.logout') }}" class="btn btn-danger waves-effect text-white m-5"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bx bx-power-off text-white"></i>
                        <span key="t-logout">@lang('translation.Logout')</span>
                        <form class="logout" id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
