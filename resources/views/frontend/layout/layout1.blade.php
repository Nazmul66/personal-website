<!DOCTYPE html>
<html lang="en">

<x-head headTitle='{{ $headTitle }}' />

<body>
    <main class="page-wrapper rbt-dashboard-page">
        <div class="rbt-panel-wrapper">

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
