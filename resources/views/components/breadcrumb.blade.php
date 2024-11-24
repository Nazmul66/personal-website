<!-- Start Breadcrumb Area  -->
<div class="main-content">
    <!-- Start Breadcarumb area  -->
    <div class="breadcrumb-area breadcarumb-style1 pt--180 pb--60">
        @if (
            !request()->is('roadmap') &&
            !request()->is('team') &&
            !request()->is('about') &&
            !request()->is('privacy-policy') &&
            !request()->is('terms-condition')
        )
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h1 class="title theme-gradient h2"></h1>
                        <ul class="page-list">
                            <li class="rainbow-breadcrumb-item"><a href="/">Home</a></li>
                            <li class="rainbow-breadcrumb-item active"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    <!-- End Breadcarumb area  -->
    <div class="chatenai-separator">
        <img class="w-100 separator-dark" src="{{ asset('assets/images/separator/separator-bottom.svg') }}" alt="separator">
        <img class="w-100 separator-light" src="{{ asset('assets/images/light/separator/separator-bottom.svg') }}" alt="separator">
    </div>
</div>