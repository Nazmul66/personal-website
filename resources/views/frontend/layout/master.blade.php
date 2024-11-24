<!DOCTYPE html>
<html lang="en">

@include('frontend.include.css')

<body>

    <main class="page-wrapper">

        <!-- Start Header Top Area  -->
        @include('frontend.include.headerTop')
        <!-- End Header Top Area  -->

        <div id="my_switcher" class="my_switcher">
            <ul>
                <li>
                    <a href="javascript: void(0);" data-theme="light" class="setColor light">
                        <img src="{{ asset('assets/images/light/switch/sun-01.svg') }}" alt="Sun images"><span
                            title="Light Mode"> Light</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" data-theme="dark" class="setColor dark">
                        <img src="{{ asset('assets/images/light/switch/vector.svg') }}" alt="Vector Images"><span
                            title="Dark Mode">
                            Dark</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Start Header Area  -->
        @include('frontend.include.header')

        <!-- start Preloader -->
        @include('frontend.include.preloader')
        <!-- End Preloader -->

        <!-- start main Body Content -->
        @yield('body-content')
        <!-- end main Body Content -->

        <!-- Start Footer Area  -->
        @include('frontend.include.footer')
        <!-- End Footer Area  -->

        <!--back to top -->
        @include('frontend.include.backToUp')

    </main>

    <!-- All Scripts  -->
    @include('frontend.include.script')

</body>

</html>
