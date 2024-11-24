@php
    $serviceMenus = DB::table('custom_pages')->where('menu_type', '2')->where('section_type', '1')->where('is_active', '1')->orderBy('order_id', 'desc')->get();
    $linksMenus = DB::table('custom_pages')->where('menu_type', '2')->where('section_type', '2')->where('is_active', '1')->orderBy('order_id', 'desc')->get();
    $moreLinksMenus = DB::table('custom_pages')->where('menu_type', '2')->where('section_type', '3')->where('is_active', '1')->orderBy('order_id', 'desc')->get();
@endphp


<!-- Start Footer Area  -->
<footer class="rainbow-footer footer-style-default footer-style-3 position-relative">
    <div class="chatenai-separator has-position-top">
        <img class="w-100 separator-dark" src="{{ asset('assets/images/separator/separator-top.svg') }}" alt="separator">
        <img class="w-100 separator-light" src="{{ asset('assets/images/light/separator/separator-top.svg') }}"
            alt="separator">
    </div>
    <div class="footer-top">
        <div class="container">
            <div class="row justify-content-center mb--30">
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="rainbow-footer-widget text-center">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img class="logo-light" src="{{ asset(getSetting()->site_logo) }}"
                                    alt="{{ asset(getSetting()->site_name) }}" style="max-height: 85px !important;">
                                <img class="logo-dark m-auto" src="{{ asset(getSetting()->site_logo) }}"
                                    alt="{{ asset(getSetting()->site_name) }}" style="max-height: 85px !important;">
                            </a>
                        </div>
                        {{-- <p class="b1 text-center mt--20 mb--0">Create Website By CraftedFate So Quick Download And Make
                            Your Site.</p> --}}
                    </div>
                </div>
            </div>
            <div class="separator-animated animated-true mt--50 mb--50"></div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="rainbow-footer-widget">
                        <h4 class="title">Newsletter</h4>
                        <div class="inner">
                            <h6 class="subtitle">2000+ Our clients are subscribe Around the World</h6>

                            <form class="newsletter-form" action="{{ route('subscription') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Enter Your Email Here....">
                                    <button class="btn-default bg-solid-primary" type="submit"><i
                                            class="feather-arrow-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                    <div class="rainbow-footer-widget">
                        <div class="widget-menu-top">
                            <h4 class="title">Services</h4>
                            <div class="inner">
                                <ul class="footer-link link-hover">
                                    <li><a href="{{ route('user.dashboard.emailGenerator') }}">Email Generator</a></li>
                                    <li><a href="{{ route('user.dashboard.textGenerator') }}">Text Generator</a></li>
                                    <li><a href="{{ route('user.dashboard.codeGenerator') }}">Code Generator</a></li>
                                    @if($serviceMenus->count() > 0)
                                    @foreach ($serviceMenus as $item)
                                    <li><a href="{{ route('customPage', $item->url_slug) }}">{{$item->title}}</a></li>
                                    @endforeach
                                    @endif
                                    {{-- <li><a href="{{ route('user.dashboard.videoGenerator') }}">Video Generator</a></li> --}}
                                    {{-- <li><a href="{{ route('user.dashboard.imageGenerator') }}">Image Generator</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                    <div class="rainbow-footer-widget">
                        <div class="widget-menu-bottom">
                            <h4 class="title">Useful Links</h4>
                            <div class="inner">
                                <ul class="footer-link link-hover">
                                    <li><a href="{{ route('contact') }}">Contact</a></li>
                                    @if($linksMenus->count() > 0)
                                        @foreach ($linksMenus as $item)
                                            <li><a href="{{ route('customPage', $item->url_slug) }}">{{$item->title}}</a></li>
                                        @endforeach
                                    @endif
                                    {{-- <li><a href="{{ route('about') }}">About</a></li>
                                    <li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
                                    <li><a href="{{ route('terms.condition') }}">Terms And Condition</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                    <div class="rainbow-footer-widget">
                        <div class="widget-menu-top">
                            <h4 class="title">Company</h4>
                            <div class="inner">
                                <ul class="footer-link link-hover">
                                    <li><a href="#">Corporate</a></li>
                                    <li><a href="#">Portfolio</a></li>
                                    <li><a href="#">SEO Agency</a></li>
                                    <li><a href="#">Web Agency</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                    <div class="rainbow-footer-widget">
                        <div class="widget-menu-bottom">
                            <h4 class="title">More Links</h4>
                            <div class="inner">
                                <ul class="footer-link link-hover">
                                    {{-- <li><a href="#">Gallery</a></li> --}}
                                    <li>
                                        @if (!Auth::check())
                                            <a href="{{ url('/login') }}">Sign In</a>
                                        @endif
                                    </li>
                                    <li><a href="{{ route('pricing') }}">Pricing</a></li>
                                    <li><a href="{{ route('faq') }}">Faq</a></li>
                                    @if($moreLinksMenus->count() > 0)
                                        @foreach ($moreLinksMenus as $item)
                                            <li><a href="{{ route('customPage', $item->url_slug) }}">{{$item->title}}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
<!-- End Footer Area  -->
