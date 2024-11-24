<div class="copyright-area copyright-style-one">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-8 col-sm-12 col-12">
                <div class="copyright-left">
                    <ul class="ft-menu link-hover">
                        <li>
                            <a href="{{ route('privacy.policy') }}">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="{{ route('terms.condition') }}">Terms And Condition</a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-4 col-sm-12 col-12">
                <div class="copyright-right text-center text-lg-end">
                    <p class="copyright-text">Copyright © 2024
                        <a href="{{ url('/') }}"
                            class="btn-read-more"><span>{{ getSetting()->site_name }}</span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
