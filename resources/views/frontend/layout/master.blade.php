<!DOCTYPE html>
<html lang="en">

    @include('frontend.include.css')

  <body>
    <!--================================
           PRELOADER START
    =================================-->
       @include('frontend.include.preloader')
    <!--================================
           PRELOADER END
    =================================-->

    <!--============================
          MAIN MANU START
    ==============================-->
      @include('frontend.include.header')

    <!--============================
        MAIN MANU END
    ==============================-->


            <!--============================
                   Body Content START
            ==============================-->

            @yield('body-content')

            <!--============================
                   Body Content END
            ==============================-->


    <!--============================
        COPYRIGHT START
    ==============================-->
      @include('frontend.include.copyright')
    <!--============================
        COPYRIGHT END
    ==============================-->

    @include('frontend.include.backToUp')

    <!--js-->
     @include('frontend.include.script')
  </body>
</html>
