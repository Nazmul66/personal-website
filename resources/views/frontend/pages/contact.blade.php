<!DOCTYPE html>
<html lang="en">

<x-head headTitle="Contact" css='<link rel="stylesheet" href={{ asset("assets/css/plugins/fontawesome-all.min.css") }}' />

<body>
    <main class="page-wrapper">

        <!-- Start Header Top Area  -->
        <x-headerTop />
        <!-- End Header Top Area  -->

        {{-- <div id="my_switcher" class="my_switcher">
            <ul>
                <li>
                    <a href="javascript: void(0);" data-theme="light" class="setColor light">
                        <img src="{{ asset('assets/images/light/switch/sun-01.svg') }}" alt="Sun images"><span title="Light Mode"> Light</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" data-theme="dark" class="setColor dark">
                        <img src="{{ asset('assets/images/light/switch/vector.svg') }}" alt="Vector Images"><span title="Dark Mode">
                            Dark</span>
                    </a>
                </li>
            </ul>
        </div> --}}

        <!-- Start Header Area  -->
        <x-header2 />
        <!-- End Header Area  -->

        <x-mobileMenu />

        <!-- Imroz Preloader -->
        <x-preloader />

        <!-- Start Contact Area  -->
        <div class="main-content">
            <div class="rainbow-contact-area rainbow-section-gap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 mb--40">
                            <div class="section-title text-center" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                                <h4 class="subtitle "><span class="theme-gradient">Contact Form</span></h4>
                                <h2 class="title w-600 mb--20">Our Contact Address Here.</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row row--15">
                        <div class="col-lg-12">
                            <div class="rainbow-contact-address mt_dec--30">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="rainbow-address bg-flashlight">
                                            <div class="icon">
                                                <i class="feather-headphones"></i>
                                            </div>
                                            <div class="inner">
                                                <h4 class="title">Contact Phone Number</h4>
                                                <p><a href="#">{{ getSetting()->phone_no }} ddd</a></p>
                                                <p><a href="#">{{ getSetting()->phone_optional }}</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="rainbow-address bg-flashlight">
                                            <div class="icon">
                                                <i class="feather-mail"></i>
                                            </div>
                                            <div class="inner">
                                                <h4 class="title">Our Email Address</h4>
                                                <p><a href="mailto:admin@gmail.com">admin@gmail.com</a></p>
                                                <p><a href="mailto:example@gmail.com">example@gmail.com</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="rainbow-address bg-flashlight">
                                            <div class="icon">
                                                <i class="feather-map-pin"></i>
                                            </div>
                                            <div class="inner">
                                                <h4 class="title">Our Location</h4>
                                                <p>5678 Bangla Main Road, cities 580 <br> GBnagla, example 54786</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt--40 row--15">
                        <div class="col-lg-7">
                            <form class="contact-form-1 rainbow-dynamic-form" id="contact-form" method="POST" action="mail') }}">
                                <div class="form-group">
                                    <input type="text" name="contact-name" id="contact-name" placeholder="Your Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="contact-phone" id="contact-phone" placeholder="Phone Number">
                                </div>
                                <div class="form-group">
                                    <input type="email" id="contact-email" name="contact-email" placeholder="Your Email">
                                </div>

                                <div class="form-group">
                                    <input type="text" id="subject" name="subject" placeholder="Your Subject">
                                </div>

                                <div class="form-group">
                                    <textarea name="contact-message" id="contact-message" placeholder="Your Message"></textarea>
                                </div>

                                <div class="form-group">
                                    <button name="submit" type="submit" id="submit" class="btn-default btn-large rainbow-btn">
                                        <span>Submit Now</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-5 mt_md--30 mt_sm--30">
                            <div class="google-map-style-1">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14554259.179133086!2d-105.54385245388013!3d37.49334218664659!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sbd!4v1630777307491!5m2!1sen!2sbd" width="600" height="550" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Contact Area  -->

        <!-- Start Footer Area  -->
        <x-footer />
        <!-- End Footer Area  -->

        <!-- Start Copy Right Area  -->
        <x-copyright />
        <!-- End Copy Right Area  -->

        <!--back to top -->
        <x-backToTop />

    </main>

    <!-- script -->
    <x-script />

</body>

</html>