<!DOCTYPE html>
<html lang="en">

<x-head headTitle='{{ $headTitle }}' />

<body>
    <main class="page-wrapper rbt-dashboard-page">
        <div class="rbt-panel-wrapper">

            <!-- start switcher -->
            <div id="my_switcher" class="my_switcher">
                <ul>
                    <li>
                        <a href="javascript:void(0);" data-theme="light" class="setColor light">
                            <img src="{{ asset('assets/images/light/switch/sun-01.svg') }}" alt="Sun images"><span
                                title="Light Mode"> Light</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-theme="dark" class="setColor dark">
                            <img src="{{ asset('assets/images/light/switch/vector.svg') }}" alt="Vector Images"><span
                                title="Dark Mode">
                                Dark</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- end switcher -->

            <!-- start header -->
            <x-header toggle="{{ isset($toggle) ? $toggle : 'false' }}" />
            <!-- End  header -->

            <!-- start mobilemenu -->
            <x-mobileMenu />
            <!-- End  mobilemenu -->

            <!-- Imroz Preloader -->
            <x-preloader />
            <!-- End Preloader -->

            <!-- Start Left panel -->
            <x-leftPanel />
            <!-- End Left panel -->

            @yield('content')

            <!--New Chat Section Modal HTML -->
            <x-newChatModal />

            <!--Like Section Modal HTML -->
            <x-likeModal />

            <!--DisLike Section Modal HTML -->
            <x-disLikeModal />

            <!--Share Section Modal HTML -->
            <x-shareModal />

            <!--back to top -->
            <x-backToTop />

    </main>

    <!-- start script -->
    <x-script />
    <!-- End  script -->

</body>

</html>
