<!-- Start Footer Area  -->
<footer class="rainbow-footer footer-style-default footer-style-3 position-relative">
    <div class="chatenai-separator has-position-top">
        <img class="w-100 separator-dark" src="{{ asset('assets/images/separator/separator-top.svg') }}" alt="separator">
        <img class="w-100 separator-light" src="{{ asset('assets/images/light/separator/separator-top.svg') }}" alt="separator">
    </div>
    <div class="footer-top">
        <div class="container">
            <div class="row justify-content-center mb--30">
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="rainbow-footer-widget text-center">
                        <div class="logo">
                            <a href="{{ route('index') }}">
                                <img class="logo-light" src="{{ asset('assets/images/logo/logo.png') }}" alt="Corporate Logo">
                                <img class="logo-dark m-auto" src="{{ asset('assets/images/logo/logo-dark.png') }}" alt="Corporate Logo">
                            </a>
                        </div>
                        <p class="b1 text-center mt--20 mb--0">Create Website By ChatenAI So Quick Download And Make
                            Your Site.</p>
                    </div>
                </div>
            </div>
            <div class="separator-animated animated-true mt--50 mb--50"></div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="rainbow-footer-widget">
                        <h4 class="title">Newsletter</h4>
                        <div class="inner">
                            <h6 class="subtitle">2000+ Our clients are subscribe Around the World</h6>
                            <form class="newsletter-form" action="#">
                                <div class="form-group">
                                    <input type="email" placeholder="Enter Your Email Here">
                                    <button class="btn-default bg-solid-primary" type="submit"><i class="feather-arrow-right"></i></button>
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
                                    <li><a href="{{ route('imageGenerator') }}">Image Generator</a></li>
                                    <li><a href="{{ route('vedioGenerator') }}">Video Generator</a></li>
                                    <li><a href="{{ route('textGenerator') }}">Text Generator</a></li>
                                    <li><a href="{{ route('codeGenerator') }}">Code Generator</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                    <div class="rainbow-footer-widget">
                        <div class="widget-menu-bottom">
                            <h4 class="title">Products</h4>
                            <div class="inner">
                                <ul class="footer-link link-hover">
                                    <li><a href="{{ route('utilize') }}">About</a></li>
                                    <li><a href="{{ route('contact') }}">Contact</a></li>
                                    <li><a href="{{ route('roadmap') }}">Roadmap</a></li>
                                    <li><a href="{{ route('termsPolicy') }}">Terms Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
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
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                    <div class="rainbow-footer-widget">
                        <div class="widget-menu-bottom">
                            <h4 class="title">Solutions</h4>
                            <div class="inner">
                                <ul class="footer-link link-hover">
                                    <li><a href="#">Gallery</a></li>
                                    <li><a href="{{ route('team') }}">Testimonial</a></li>
                                    <li><a href="{{ route('contact') }}">Contact</a></li>
                                    <li><a href="{{ route('roadmap') }}">Roadmap</a></li>
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