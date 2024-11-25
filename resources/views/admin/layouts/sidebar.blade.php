<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboard">Dashboard</span>
                    </a>
                </li>
                

                <li>
                    <a href="{{ route('admin.subscription.index') }}" class="waves-effect">
                        <i class='bx bxs-purchase-tag'></i>
                        <span key="t-contacts">Subscriptions</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.contact.index') }}" class="waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span key="t-contacts">Contacts</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.faq.index') }}" class="waves-effect">
                        <i class="mdi mdi-comment-question-outline"></i>
                        <span key="t-faqs">@lang('translation.FAQs')</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('admin.brand.index') }}" class="waves-effect">
                        <i class='bx bx-cube-alt'></i>
                        <span key="t-brands">Brand</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.counter.index') }}" class="waves-effect">
                        <i class='bx bx-cube-alt'></i>
                        <span key="t-brands">Counter Section</span>
                    </a>
                </li>

                {{-- Blogs --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-code-alt"></i>
                        <span key="t-section">All Blogs</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li class="@yield('blog_category')">
                            <a href="{{ route('admin.blogs_category.index') }}" class="waves-effect">
                                <span key="t-contacts">Blog Category</span>
                            </a>
                        </li>

                        <li class="@yield('blogs')">
                            <a href="{{ route('admin.blogs.index') }}" class="waves-effect">
                                <span key="t-contacts">Blogs Section</span>
                            </a>
                        </li>
                    </ul>
                </li>


                {{-- Frontend Section --}}
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


                        @if (Auth::user()->can('admin.about.index'))
                        <li>
                            <a href="{{ route('admin.about.index') }}" class="waves-effect">
                                <span key="t-contacts">About Section</span>
                            </a>
                        </li>
                        @endif

                        {{-- @if (Auth::user()->can('admin.promotions.index')) --}}
                        <li class="@yield('services')">
                            <a href="{{ route('admin.services.index') }}" class="waves-effect">
                                <span key="t-contacts">Services Section</span>
                            </a>
                        </li>
                        {{-- @endif --}}

                        <li class="@yield('testimonial')">
                            <a href="{{ route('admin.testimonials.index') }}" class="waves-effect">
                                <span key="t-contacts">Testimonial Section</span>
                            </a>
                        </li>

                        <li class="@yield('project')">
                            <a href="{{ route('admin.projects.index') }}" class="waves-effect">
                                <span key="t-contacts">Projects Section</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="@yield('cpage_list')">
                    <a href="{{ route('admin.cpage.index') }}" class="waves-effect">
                        <i class='bx bx-window-alt'></i>
                        <span key="t-section">Custom Pages</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.setting.general.setting') }}" class="waves-effect">
                        <i class='bx bx-cog'></i>
                        <span key="t-section">settings</span>
                    </a>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-user-shield"></i>
                        <span key="t-section">Admin & Roles</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="@yield('admin-role')"><a href="{{ route('admin.admin.index') }}"
                                key="">Admins</a></li>
                    </ul>
                </li>

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
