@extends('frontend.layout.master')

@push('meta-data')
    Home
@endpush

@push('add-css')
@endpush

@section('body-content')
    @if($banner_section->is_active == 1)
    <!-- Start Slider Area  -->
        <div class="slider-area slider-style-1 variation-default slider-bg-image bg-banner1" data-black-overlay="1">
            <!-- <div class="bg-blend-top bg_dot-mask"></div> -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="inner text-center mt--60">
                            <h1 class="title display-one">{{$banner_section->title}}</h1>
                            {{-- <h1 class="title display-one">Unlock The Power Of <br>
                                <span class="theme-gradient">CraftedFate AI</span> With <br><span class="color-off">Smartest
                                    AI</span>
                            </h1> --}}
                            <p class="b1 desc-text">{{$banner_section->subtitle}}</p>
                            <div class="button-group">
                                <a class="btn-default bg-light-gradient btn-large" href="{{ $banner_section->button_link }}">
                                    <div class="has-bg-light"></div>
                                    <span>{{ $banner_section->button_text }}</span>
                                </a>
                            </div>
                            <p class="color-gray mt--5">{!! $banner_section->content !!}</p>
                        </div>
                    </div>
                    <div class="col-lg-10 col-xl-10 order-1 order-lg-2">
                        <div class="frame-image frame-image-bottom bg-flashlight video-popup icon-center">
                            <img src="{{ getPhoto($banner_section->image_path) }}" alt="Banner Images">
                            <div class="video-icon">
                                <a class="btn-default rounded-player popup-video border bg-white-dropshadow"
                                    href="{{ asset($banner_section->video_link) }}">
                                    <span><i class="feather-play"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chatenai-separator has-position-bottom">
                <img class="w-100 separator-dark" src="{{ asset('assets/images/separator/separator-top.svg') }}"
                    alt="separator">
                <img class="w-100 separator-light" src="{{ asset('assets/images/light/separator/separator-top.svg') }}"
                    alt="separator">
            </div>
        </div>
    <!-- End Slider Area  -->
    @endif

    @if($content_generation_section->is_active == 1)
    <!-- Start Service__Style--1 Area  -->
    <div class="rainbow-service-area rainbow-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                        <h4 class="subtitle">
                            <span class="theme-gradient">{{$content_generation_section->title}}</span>
                        </h4>
                        <h2 class="title w-600 mb--20">{{$content_generation_section->subtitle}}</h2>
                        <p class="description b1">{!! $content_generation_section->content !!}</p>
                    </div>
                </div>
            </div>

            <div class="row row--15 service-wrapper">
                @foreach ($content_generators as $row)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-sal="slide-up" data-sal-duration="700">
                        <div
                            class="service service__style--1 bg-color-blackest radius mt--25 text-center rbt-border-none variation-4 bg-flashlight">
                            <div class="icon">
                                {!! $row->icon !!}
                            </div>
                            <div class="content">
                                <h4 class="title w-600">
                                    <a href="#">{{ $row->title }}</a>
                                </h4>
                                <p class="description b1 color-gray mb--0">{{ $row->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-sal="slide-up" data-sal-duration="700">
                    <div
                        class="service service__style--1 bg-color-blackest radius mt--25 text-center rbt-border-none variation-4 bg-flashlight">
                        <div class="icon">
                            <i class="feather-activity"></i>
                        </div>
                        <div class="content">
                            <h4 class="title w-600">
                                <a href="#">Effortless Content AI</a>
                            </h4>
                            <p class="description b1 color-gray mb--0">Let our AI-powered service take the hard work out of
                                content creation. Get started today with AI.</p>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-sal="slide-up" data-sal-duration="700"
                    data-sal-delay="100">
                    <div
                        class="service service__style--1 bg-color-blackest radius mt--25 text-center rbt-border-none variation-4 bg-flashlight">
                        <div class="icon">
                            <i class="feather-cast"></i>
                        </div>
                        <div class="content">
                            <h4 class="title w-600">
                                <a href="#">Your Words, Our Tech</a>
                            </h4>
                            <p class="description b1 color-gray mb--0">Discover how AI can transform your ideas into
                                engaging with our qualitifull service for a better content.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-sal="slide-up" data-sal-duration="700"
                    data-sal-delay="200">
                    <div
                        class="service service__style--1 bg-color-blackest radius mt--25 text-center rbt-border-none variation-4 bg-flashlight">
                        <div class="icon">
                            <i class="feather-map"></i>
                        </div>
                        <div class="content">
                            <h4 class="title w-600">
                                <a href="#">AI-Powered Writing </a>
                            </h4>
                            <p class="description b1 color-gray mb--0">Access AI-generated content for your blogs, websites,
                                and more with our qualitifull convenient service.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-sal="slide-up" data-sal-duration="700">
                    <div
                        class="service service__style--1 bg-color-blackest radius mt--25 text-center rbt-border-none variation-4 bg-flashlight">
                        <div class="icon">
                            <i class="feather-loader"></i>
                        </div>
                        <div class="content">
                            <h4 class="title w-600">
                                <a href="#">AI Generation Simple</a>
                            </h4>
                            <p class="description b1 color-gray mb--0">Experience the ease of content creation with our AI
                                service. Write less, achieve more.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-sal="slide-up" data-sal-duration="700"
                    data-sal-delay="100">
                    <div
                        class="service service__style--1 bg-color-blackest radius mt--25 text-center rbt-border-none variation-4 bg-flashlight">
                        <div class="icon">
                            <i class="feather-speaker"></i>
                        </div>
                        <div class="content">
                            <h4 class="title w-600">
                                <a href="#">Quality AI Content</a>
                            </h4>
                            <p class="description b1 color-gray mb--0">Get professionally written content in no time with
                                our AI service. Quality meets speed.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-sal="slide-up" data-sal-duration="700"
                    data-sal-delay="200">
                    <div
                        class="service service__style--1 bg-color-blackest radius mt--25 text-center rbt-border-none variation-4 bg-flashlight">
                        <div class="icon">
                            <i class="feather-terminal"></i>
                        </div>
                        <div class="content">
                            <h4 class="title w-600">
                                <a href="#">Your Writing Assistant</a>
                            </h4>
                            <p class="description b1 color-gray mb--0">Collaborate with AI to generate content that
                                resonates with your audience. Try it now.</p>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- End Service__Style--1 Area  -->

    <!-- Start Seperator Area  -->
    <div class="chatenai-separator">
        <img class="w-100 separator-dark" src="{{ asset('assets/images/separator/separator-top.svg') }}" alt="separator">
        <img class="w-100 separator-light" src="{{ asset('assets/images/light/separator/separator-top.svg') }}"
            alt="separator">
    </div>
    <!-- End Seperator Area  -->
    @endif

    @if($how_works_section->is_active == 1)
    <!-- Start Timeline-Style-Four  -->
    <div class="rainbow-timeline-area rainbow-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                        <h4 class="subtitle ">
                            <span class="theme-gradient">{{ $how_works_section->title }}</span>
                        </h4>
                        <h2 class="title w-600 mb--20">{{ $how_works_section->subtitle }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1 mt--30">
                    <div class="timeline-style-two bg-flashlight bg-color-blackest">
                        <div class="row row--0">
                            @foreach ($directions as $key => $row)
                                <div class="col-lg-4 col-md-4 rainbow-timeline-single dark-line">
                                    <div class="rainbow-timeline">
                                        <h6 class="title" data-sal="slide-up" data-sal-duration="700" data-sal-delay="200">
                                            {{$key+1}}. {{ $row->title }}</h6>
                                        <div class="progress-line">
                                            <div class="line-inner"></div>
                                        </div>
                                        <div class="progress-dot">
                                            <div class="dot-level">
                                                <div class="dot-inner"></div>
                                            </div>
                                        </div>
                                        <p class="description" data-sal="slide-up" data-sal-duration="700" data-sal-delay="300">
                                            {{ $row->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="button-group mt--50 text-center">
                        <a class="btn-default btn-large"
                            href="{{ $how_works_section->button_link }}">{{ $how_works_section->button_text }}</a>
                        <a class="btn-default btn-large btn-border popup-video"
                            href="{{ asset($how_works_section->button_link_2) }}"><span>
                                {!! $how_works_section->icon !!}
                            </span> {{ $how_works_section->button_text_2 }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Timeline-Style-Four  -->

    <!-- Start Seperator Area  -->
    <div class="chatenai-separator">
        <img class="w-100 separator-dark" src="{{ asset('assets/images/separator/separator-bottom.svg') }}"
            alt="separator">
        <img class="w-100 separator-light" src="{{ asset('assets/images/light/separator/separator-bottom.svg') }}"
            alt="separator">
    </div>
    <!-- End Seperator Area  -->
    @endif

    @if($about_section->is_active == 1)
    <!-- Start Split Style-1 Area  -->
    <div class="rainbow-split-area rainbow-section-gap">
        <div class="container">
            <div class="rainbow-splite-style">
                <div class="split-wrapper">
                    <div class="row g-0 radius-10 align-items-center">
                        <div class="col-lg-12 col-xl-6 col-12">
                            <div class="thumbnail">
                                <img class="radius" src="{{ getPhoto($about_section->image_path) }}"
                                    alt="split Images">
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-6 col-12">
                            <div class="split-inner">
                                <h4 class="title" data-sal="slide-up" data-sal-duration="400" data-sal-delay="200">{{$about_section->title}}</h4>
                                <p class="description" data-sal="slide-up" data-sal-duration="400" data-sal-delay="300">{!! $about_section->content !!}</p>
                                <div class="view-more-button mt--35" data-sal="slide-up" data-sal-duration="400"
                                    data-sal-delay="400">
                                    <a class="btn-default" href="{{$about_section->button_link}}">{{$about_section->button_text}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Split Style-1 Area  -->

    <!-- Start Seperator Area  -->
    <div class="chatenai-separator">
        <img class="w-100 separator-dark" src="{{ asset('assets/images/separator/separator-top.svg') }}"
            alt="separator">
        <img class="w-100 separator-light" src="{{ asset('assets/images/light/separator/separator-top.svg') }}"
            alt="separator">
    </div>
    <!-- End Seperator Area  -->
    @endif

    <!-- Start Pricing Area  -->
    <div class="rainbow-pricing-area rainbow-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center" data-sal="slide-up" data-sal-duration="400"
                        data-sal-delay="150">
                        <h4 class="subtitle "><span class="theme-gradient">Pricing</span></h4>
                        <h2 class="title w-600 mb--20">Commence Content Journey with AI</h2>
                        <p class="description b1">Collaborate with AI to generate content that resonates.</p>
                    </div>
                </div>
            </div>
            <div class="wrapper">
                {{-- @if (!empty($planYear) && $planYear->count() > 0) --}}
                <div class="row">
                    <div class="col-lg-12">
                        @if (!empty($planMonthly) && $planMonthly->count() > 0 && !empty($planYear) && $planYear->count() > 0)
                            <nav class="chatenai-tab">
                                <div class="tab-btn-grp nav nav-tabs text-center justify-content-center" id="nav-tab"
                                    role="tablist">
                                    @if (!empty($planMonthly) && $planMonthly->count() > 0)
                                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-home" type="button" role="tab"
                                            aria-controls="nav-home" aria-selected="true">
                                            Monthly
                                        </button>
                                    @endif
                                    @if (!empty($planYear) && $planYear->count() > 0)
                                        <button class="nav-link with-badge" id="nav-profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-profile" type="button" role="tab"
                                            aria-controls="nav-profile" aria-selected="false">
                                            Yearly
                                            {{-- <span class="rainbow-badge-card badge-border">20% Off</span> --}}
                                        </button>
                                    @endif
                                </div>
                            </nav>
                        @endif
                    </div>
                </div>
                {{-- @endif --}}
                <div class="tab-content rainbow-section-gap bg-transparent bg-light" id="nav-tabContent">
                    @if (!empty($planMonthly) && $planMonthly->count() > 0 && !empty($planYear) && $planYear->count() > 0)
                        <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            @include('frontend.partials.monthlyplan', ['plans' => $planMonthly])
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            @include('frontend.partials.yearlyplan', ['plans' => $planYear])
                        </div>
                    @elseif (!empty($planMonthly) && $planMonthly->count() > 0)

                        @include('frontend.partials.monthlyplan', ['plans' => $planMonthly])
                    @elseif (!empty($planYear) && $planYear->count() > 0)

                        @include('frontend.partials.yearlyplan', ['plans' => $planYear])
                    @endif
                    {{-- <div class="tab-pane fade active show" id="nav-home" role="tabpanel"
                        aria-labelledby="nav-home-tab">
                        <div class="row row--15 mt_dec--30">
                            @if (!empty($planMonthly) && $planMonthly->count() > 0)
                                @foreach ($planMonthly as $plan)
                                    <div class="col-xl-4 col-lg-6 col-md-6 col-12 mt--30">
                                        <div class="rainbow-pricing style-chatenai">
                                            <div class="pricing-table-inner bg-flashlight">
                                                <div class="pricing-top">
                                                    <div class="pricing-header">
                                                        <h4 class="title">{{ $plan->title }}</h4>
                                                        <div class="pricing">
                                                            <div class="price-wrapper">
                                                                <span class="currency">$</span><span class="price pricing_price">{{ $plan->price }}</span>
                                                            </div>
                                                            <span class="subtitle">USD Per {{ $plan->frequency == 1 ? 'Month' : 'Year' }}</span>
                                                        </div>
                                                        <div class="separator-animated mt--30 mb--30"></div>
                                                    </div>
                                                    <div class="pricing-body">
                                                        <ul class="list-style--1">
                                                            @foreach ($plan->features as $feature)
                                                                <li><i class="feather-check-circle"></i> {{ $feature->feature_name }}</li>
                                                            @endforeach
                                                            @if ($plan->features->isEmpty())
                                                                <li><i class="feather-minus-circle"></i> No additional features</li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="pricing-footer">
                                                    <a class="btn-default btn-border" href="{{route('user.dashboard.checkout', $plan->id)}}">{{$plan->text_link_name}}</a>
                                                    @if(auth()->check() && auth()->user()->current_pan_id == $plan->id)
                                                            <a class="btn-default btn-border disabled" href="javascript:void(0);" style="pointer-events: none; opacity: 0.6;">
                                                                Active (Current)
                                                            </a>
                                                            @else
                                                                <a class="btn-default btn-border" href="{{ route('user.dashboard.checkout', $plan->id) }}">
                                                                    {{ $plan->text_link_name }}
                                                                </a>
                                                            @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                        aria-labelledby="nav-profile-tab">
                        <div class="row row--15 mt_dec--30">
                            @if (!empty($planYear) && $planYear->count() > 0)
                                @foreach ($planYear as $plan)
                                    <div class="col-xl-4 col-lg-6 col-md-6 col-12 mt--30">
                                        <div class="rainbow-pricing style-chatenai">
                                            <div class="pricing-table-inner bg-flashlight">
                                                <div class="pricing-top">
                                                    <div class="pricing-header">
                                                        <h4 class="title">{{ $plan->title }}</h4>
                                                        <div class="pricing">
                                                            <div class="price-wrapper">
                                                                <span class="currency">$</span><span class="price pricing_price">{{ $plan->price }}</span>
                                                            </div>
                                                            <span class="subtitle">USD Per {{ $plan->frequency == 1 ? 'Month' : 'Year' }}</span>
                                                        </div>
                                                        <div class="separator-animated mt--30 mb--30"></div>
                                                    </div>
                                                    <div class="pricing-body">
                                                        <ul class="list-style--1">
                                                            @foreach ($plan->features as $feature)
                                                                <li><i class="feather-check-circle"></i> {{ $feature->feature_name }}</li>
                                                            @endforeach
                                                            @if ($plan->features->isEmpty())
                                                                <li><i class="feather-minus-circle"></i> No additional features</li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="pricing-footer">
                                                    <a class="btn-default btn-border" href="#">{{$plan->text_link_name}}</a>
                                                    @if(auth()->check() && auth()->user()->current_pan_id == $plan->id)
                                                        <a class="btn-default btn-border disabled" href="javascript:void(0);" style="pointer-events: none; opacity: 0.6;">
                                                            Active (Current)
                                                        </a>
                                                    @else
                                                        <a class="btn-default btn-border" href="{{ route('user.dashboard.checkout', $plan->id) }}">
                                                            {{ $plan->text_link_name }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="col-xl-4 col-lg-6 col-md-6 col-12 mt--30">
                                <div class="rainbow-pricing style-chatenai mt--0 active">
                                    <div class="pricing-table-inner bg-flashlight">
                                        <div class="pricing-top">
                                            <div class="pricing-header">
                                                <h4 class="title">Business</h4>
                                                <div class="pricing">
                                                    <div class="price-wrapper">
                                                        <span class="currency">$</span><span
                                                            class="price">300</span>
                                                    </div>
                                                    <span class="subtitle">USD Per Year</span>
                                                </div>
                                                <div class="separator-animated animated-true mt--30 mb--30"></div>
                                            </div>
                                            <div class="pricing-body">
                                                <ul class="list-style--1">
                                                    <li>
                                                        <i class="feather-check-circle"></i> 80,000
                                                        Words
                                                    </li>
                                                    <li>
                                                        <i class="feather-check-circle"></i> 6+
                                                        Templates
                                                    </li>
                                                    <li>
                                                        <i class="feather-check-circle"></i> 5+
                                                        Languages
                                                    </li>
                                                    <li>
                                                        <i class="feather-check-circle"></i> AI Blog
                                                        generate
                                                    </li>
                                                    <li>
                                                        <i class="feather-check-circle"></i> Advance
                                                        Editor Tool
                                                    </li>
                                                    <li>
                                                        <i class="feather-check-circle"></i>
                                                        Consistent support
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="pricing-footer">
                                            <a class="btn-default" href="#">Purchase Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-12 mt--30">
                                <div class="rainbow-pricing style-chatenai mt--0 active">
                                    <div class="pricing-table-inner bg-flashlight">
                                        <div class="pricing-top">
                                            <div class="pricing-header">
                                                <h4 class="title">Advanced</h4>
                                                <div class="pricing">
                                                    <div class="price-wrapper">
                                                        <span class="currency">$</span><span
                                                            class="price">500</span>
                                                    </div>
                                                    <span class="subtitle">USD Per Year</span>
                                                </div>
                                                <div class="separator-animated animated-true mt--30 mb--30"></div>
                                            </div>
                                            <div class="pricing-body">
                                                <ul class="list-style--1">
                                                    <li>
                                                        <i class="feather-check-circle"></i> 280,000
                                                        Words
                                                    </li>
                                                    <li>
                                                        <i class="feather-check-circle"></i> 6+
                                                        Templates
                                                    </li>
                                                    <li>
                                                        <i class="feather-check-circle"></i> 5+
                                                        Languages
                                                    </li>
                                                    <li>
                                                        <i class="feather-check-circle"></i> AI Blog
                                                        generate
                                                    </li>
                                                    <li>
                                                        <i class="feather-check-circle"></i> Advance
                                                        Editor Tool
                                                    </li>
                                                    <li>
                                                        <i class="feather-check-circle"></i>
                                                        Consistent support
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="pricing-footer">
                                            <a class="btn-default" href="#">Purchase Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-12 mt--30">
                                <div class="rainbow-pricing style-chatenai mt--0">
                                    <div class="pricing-table-inner bg-flashlight">
                                        <div class="pricing-top">
                                            <div class="pricing-header">
                                                <h4 class="title">Enterprise</h4>
                                                <div class="pricing">
                                                    <div class="price-wrapper">
                                                        <span class="price sm-text">Let's Talk</span>
                                                    </div>
                                                    <span class="subtitle">Per Year</span>
                                                </div>
                                                <div class="separator-animated mt--30 mb--30"></div>
                                            </div>
                                            <div class="pricing-body">
                                                <ul class="list-style--1">
                                                    <li>
                                                        <i class="feather-check-circle"></i> 3,580,000
                                                        Words
                                                    </li>
                                                    <li>
                                                        <i class="feather-check-circle"></i> 15+
                                                        Templates
                                                    </li>
                                                    <li>
                                                        <i class="feather-check-circle"></i> 8+
                                                        Languages
                                                    </li>
                                                    <li>
                                                        <i class="feather-check-circle"></i> AI Blog
                                                        generate
                                                    </li>
                                                    <li>
                                                        <i class="feather-check-circle"></i> Advance
                                                        Editor Tool
                                                    </li>
                                                    <li>
                                                        <i class="feather-check-circle"></i>
                                                        Consistent support
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="pricing-footer">
                                            <a class="btn-default btn-border" href="#">Contact Sales</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>

            <div class="button-group mt--50 text-center">
                <a class="btn-default btn-large btn-border" href="{{ asset('pricing') }}">View More</a>
            </div>
        </div>
    </div>
    <!-- End Pricing Area  -->

    <!-- Start Seperator Area  -->
    <div class="chatenai-separator">
        <img class="w-100 separator-dark" src="{{ asset('assets/images/separator/separator-top.svg') }}"
            alt="separator">
        <img class="w-100 separator-light" src="{{ asset('assets/images/light/separator/separator-top.svg') }}"
            alt="separator">
    </div>
    <!-- End Seperator Area  -->

    @if($faqs->count() > 0)
    <!-- Start Accordion-2 Area  -->
    <div class="rainbow-accordion-area rainbow-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="section-title text-center" data-sal="slide-up" data-sal-duration="700"
                        data-sal-delay="100">
                        <h4 class="subtitle "><span class="theme-gradient">Accordion</span></h4>
                        <h2 class="title w-600 mb--20">Frequently Asked Questions</h2>
                    </div>
                </div>
            </div>
            <div class="row mt--35 row--20">
                <div class="col-lg-10 offset-lg-1">
                    <div class="rainbow-accordion-style  accordion">
                        <div class="accordion" id="accordionExamplea">

                            @foreach ($faqs as $key => $row)
                                <div class="accordion-item card bg-flashlight">
                                    <h2 class="accordion-header card-header" id="heading{{ $key }}">
                                        <button class="accordion-button {{ $key != 0 ? 'collapsed' : '' }}"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $key }}"
                                            aria-expanded="{{ $key != 0 ? 'collapsed' : '' }}"
                                            aria-controls="collapse{{ $key }}">
                                            {{ $row->question }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $key }}"
                                        class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}"
                                        aria-labelledby="heading{{ $key }}" data-bs-parent="#accordionExamplea">
                                        <div class="accordion-body card-body">
                                            {{ $row->answer }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Accordion-2 Area  -->

    <!-- Start Seperator Area  -->
    <div class="chatenai-separator">
        <img class="w-100 separator-dark" src="{{ asset('assets/images/separator/separator-top.svg') }}"
            alt="separator">
        <img class="w-100 separator-light" src="{{ asset('assets/images/light/separator/separator-top.svg') }}"
            alt="separator">
    </div>
    <!-- End Seperator Area  -->
    @endif

    @if($brands->count() > 0)
    <!-- Start Brands Area -->
    <div class="rainbow-brand-area rainbow-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center sal-animate" data-sal="slide-up" data-sal-duration="700"
                        data-sal-delay="100">
                        <h4 class="subtitle "><span class="theme-gradient">Our Awesome Client</span></h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mt--10">
                    <ul class="brand-list brand-style-2">

                        @foreach ($brands as $row)
                            <li>
                                <a href="#">
                                    <img src="{{ asset($row->image) }}" alt="{{ $row->name }}">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Brands Area -->

    <!-- Start Seperator Area  -->
    <div class="chatenai-separator">
        <img class="w-100 separator-dark" src="{{ asset('assets/images/separator/separator-top.svg') }}"
            alt="separator">
        <img class="w-100 separator-light" src="{{ asset('assets/images/light/separator/separator-top.svg') }}"
            alt="separator">
    </div>
    <!-- End Seperator Area  -->
    @endif

    @if($promotion_section->is_active == 1)
    <!-- Start Call TO Action Area  -->
    <div class="rainbow-callto-action-area">
        <div class="wrapper">
            <div class="rainbow-callto-action clltoaction-style-default rainbow-section-gap">
                <div class="container">
                    <div class="row row--0">
                        <div class="col-lg-12">
                            <div class="align-items-center content-wrapper">
                                <div class="inner">
                                    <div class="content text-center">
                                        <span class="theme-gradient b2 mb--30 d-inline-block">{{$promotion_section->title}}</span>
                                        <h2 class="title" data-sal="slide-up" data-sal-duration="400"
                                            data-sal-delay="200">{{$promotion_section->subtitle}}</h2>
                                        <p class="description" data-sal="slide-up" data-sal-duration="400"
                                            data-sal-delay="300">{!! $promotion_section->content !!}</p>
                                        <div class="call-to-btn" data-sal="slide-up" data-sal-duration="400"
                                            data-sal-delay="350">
                                            <a class="btn-default bg-light-gradient btn-large"
                                                href="{{$promotion_section->button_link}}">
                                                <div class="has-bg-light"></div>
                                                <span>{{$promotion_section->button_text}}</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fancy-genearate-section">
                <div class="container">
                    <div class="genarator-section">
                        <ul class="genarator-card-group full-width-list ">
                            @foreach ($promotions as $row)
                            <li>
                                <a href="{{$row->button_link}}"
                                    class="genarator-card bg-flashlight-static center-align">
                                    <div class="inner">
                                        <div class="left-align">
                                            <div class="img-bar">
                                                <img src="{{ getPhoto($row->icon) }}"
                                                    alt="{{$row->title}}">
                                            </div>
                                            <h5 class="title">{{$row->title}}</h5>
                                            <span class="rainbow-demo-btn">{{$row->button_text}}</span>
                                            @if($row->hot == 1)
                                                <span class="rainbow-badge-card ml--10">Hot</span>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                            {{-- <li>
                                <a href="{{ route('user.dashboard.textGenerator') }}"
                                    class="genarator-card bg-flashlight-static center-align">
                                    <div class="inner">
                                        <div class="left-align">
                                            <div class="img-bar">
                                                <img src="{{ asset('assets/images/generator-icon/text_line.png') }}"
                                                    alt="AI Generator">
                                            </div>
                                            <h5 class="title">Text Generator</h5>
                                            <span class="rainbow-demo-btn">Try It Now Free</span>

                                        </div>
                                    </div>
                                </a>
                            </li> --}}
                            {{-- <li>
                                <a href="{{ route('user.dashboard.imageEditor') }}" class="genarator-card bg-flashlight-static center-align">
                                    <div class="inner">
                                        <div class="left-align">
                                            <div class="img-bar">
                                                <img src="{{ asset('assets/images/generator-icon/photo-editor_line.png') }}" alt="AI Generator">
                                            </div>
                                            <h5 class="title">Photo Editor</h5>
                                            <span class="rainbow-demo-btn">Try It Now Free</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.dashboard.videoGenerator') }}" class="genarator-card bg-flashlight-static center-align">
                                    <div class="inner">
                                        <div class="left-align">
                                            <div class="img-bar">
                                                <img src="{{ asset('assets/images/generator-icon/video-camera_line.png') }}" alt="AI Generator">
                                            </div>
                                            <h5 class="title">Vedio Generator</h5>
                                            <span class="rainbow-demo-btn">Try It Now Free</span>
                                            <span class="rainbow-badge-card ml--10">Hot</span>
                                        </div>
                                    </div>
                                </a>
                            </li> --}}
                            {{-- <li>
                                <a href="{{ route('user.dashboard.emailGenerator') }}"
                                    class="genarator-card bg-flashlight-static center-align">
                                    <div class="inner">
                                        <div class="left-align">
                                            <div class="img-bar">
                                                <img src="{{ asset('assets/images/generator-icon/email_line.png') }}"
                                                    alt="AI Generator">
                                            </div>
                                            <h5 class="title">Email Writer</h5>
                                            <span class="rainbow-demo-btn">Try It Now Free</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.dashboard.codeGenerator') }}"
                                    class="genarator-card bg-flashlight-static center-align">
                                    <div class="inner">
                                        <div class="left-align">
                                            <div class="img-bar">
                                                <img src="{{ asset('assets/images/generator-icon/code-editor_line.png') }}"
                                                    alt="AI Generator">
                                            </div>
                                            <h5 class="title">Code Generator</h5>
                                            <span class="rainbow-demo-btn">Try It Now Free</span>
                                            <span class="rainbow-badge-card ml--10">Hot</span>
                                        </div>
                                    </div>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Call TO Action Area  -->
    @endif
@endsection


@push('add-js')
@endpush
