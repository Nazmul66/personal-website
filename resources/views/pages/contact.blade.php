<!DOCTYPE html>
<html lang="en">

<x-head headTitle="Contact" />

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
                            <div class="section-title text-center" data-sal="slide-up" data-sal-duration="700"
                                data-sal-delay="100">
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
                                                <p><a href="tel: {{ getSetting()->phone_no }}">{{ getSetting()->phone_no }}
                                                        </a></p>
                                                <p><a
                                                        href="tel: {{ getSetting()->phone_optional }}">{{ getSetting()->phone_optional }}</a>
                                                </p>
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
                                                <p><a
                                                        href="mailto:{{ getSetting()->email }}">{{ getSetting()->email }}</a>
                                                </p>
                                                <p><a
                                                        href="mailto:{{ getSetting()->support_email }}">{{ getSetting()->support_email }}</a>
                                                </p>
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
                                                <p>{{ getSetting()->address }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt--40 row--15">
                        <div class="col-lg-7">
                            <form class="contact-form-1" action="{{route('contact.store')}}" method="POST" id="contact_store">
                                @csrf

                                <div class="form-group">
                                    <label for="contact-name" class="mb-3 d-block">Your Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{old('name')}}" id="contact-name"
                                        placeholder="Enter your name">

                                    <div class="text-danger mt-2" id="err_name"></div>
                                </div>

                                <div class="form-group">
                                    <label for="contact-phone" class="mb-3 d-block">Phone Number <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="phone" value="{{old('phone')}}" id="contact-phone"
                                        placeholder="Enter your phone number">

                                    <div class="text-danger mt-2" id="err_phone"></div>
                                </div>

                                <div class="form-group">
                                    <label for="contact-email" class="mb-3 d-block">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" id="contact-email" value="{{old('email')}}" name="email"
                                        placeholder="Enter your email address">

                                    <div class="text-danger mt-2" id="err_email"></div>
                                </div>

                                <div class="form-group">
                                    <label for="subject" class="mb-3 d-block">Subject <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="subject" name="subject" value="{{old('subject')}}" placeholder="Write Subject">

                                    <div class="text-danger mt-2" id="err_subject"></div>
                                </div>

                                <div class="form-group">
                                    <label for="contact-message" class="mb-3 d-block">Message <span
                                            class="text-danger">*</span></label>
                                    <textarea name="message" id="contact-message" placeholder="Your Message...">{{old('message')}}</textarea>

                                    <div class="text-danger mt-2" id="err_message"></div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn-default btn-large rainbow-btn">
                                        Submit Now
                                    </button>
                                </div>

                                <div class="success_msg mt-5"></div>
                            </form>
                        </div>


                        <div class="col-lg-5 mt_md--30 mt_sm--30">
                            <div class="google-map-style-1">
                                {!! getSetting()->google_map !!}
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


    {{-- <script>
        $(document).ready(function() {
            $('#contact_store').on('submit', function(event) {
                event.preventDefault();

                // Gather form data
                let formData = {
                    name: $('#contact-name').val(),
                    phone: $('#contact-phone').val(),
                    email: $('#contact-email').val(),
                    subject: $('#subject').val(),
                    message: $('#contact-message').val(),
                    _token: '{{ csrf_token() }}' // Include CSRF token
                };

                // Send AJAX POST request
                $.ajax({
                    url: "{{ route('contact.store') }}",
                    method: "POST",
                    data: formData,
                    dataType: 'json',
                    success: function(res) {
                        console.log(res.message);
                        if (res.status === 'true') {
                            $('#contact_store')[0].reset();

                            $('#err_name').text('');
                            $('#err_phone').text('');
                            $('#err_email').text('');
                            $('#err_subject').text('');
                            $('#err_message').text('');

                            $('.success_msg').html(
                                `<p class="alert alert-success rounded">${res.message}.</p>`
                                );
                        }
                    },
                    error: function(error) {
                        // Handle error response
                        // if (error.status === 422) {
                        console.log(error);
                        let errors = error.responseJSON.errors;
                        if (errors.name) $('#err_name').text(errors.name[0]);
                        if (errors.phone) $('#err_phone').text(errors.phone[0]);
                        if (errors.email) $('#err_email').text(errors.email[0]);
                        if (errors.subject) $('#err_subject').text(errors.subject[0]);
                        if (errors.message) $('#err_message').text(errors.message[0]);
                        // } else {
                        //     alert("An unexpected error occurred. Please try again.");
                        // }
                    }
                });
            });
        });
    </script> --}}

</body>

</html>
