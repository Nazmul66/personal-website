<!DOCTYPE html>
<html lang="en">

<x-head headTitle='{{ $headTitle }}' />

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
                    <a href="'javascript: void(0);" data-theme="dark" class="setColor dark">
                        <img src="{{ asset('assets/images/light/switch/vector.svg') }}" alt="Vector Images"><span title="Dark Mode">
                            Dark</span>
                    </a>
                </li>
            </ul>
        </div> --}}

        <!-- start header -->
        @if ($header == 'header')
            <x-header toggle="{{ isset($toggle) ? $toggle : 'false' }}" />
        @elseif($header == 'header2')
            <x-header2 />
        @elseif($header == 'header3')
            <x-header3 />
        @else
            <x-header4 />
        @endif
        <!-- End  header -->

        <!-- start mobilemenu -->
        <x-mobileMenu />
        <!-- End  mobilemenu -->

        <!-- start Preloader -->
        <x-preloader />
        <!-- End Preloader -->

        @yield('content')

        <!-- Start Footer Area  -->
        <x-footer />
        <!-- End Footer Area  -->

        <!-- Start Copy Right Area  -->
        <x-copyright />
        <!-- End Copy Right Area  -->

        <!--back to top -->
        <x-backToTop />

    </main>

    <!-- start script -->
    <x-script />
    <!-- End  script -->

</body>

</html>
