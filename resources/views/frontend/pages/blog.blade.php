@extends('layout.layout2')

@php
$headTitle = 'Settings';
$title = 'Our Blog';
$subTitle = 'Blog';
$header = 'header3';
@endphp

@section('content')

<!-- Start Blog Area  -->
<div class="rainbow-blog-area rainbow-section-gap bg-color-1 ">
    <div class="container">
        <div class="row row--30">
            <div class="col-lg-8">
                <div class="row mt_dec--30">
                    <div class="col-lg-12">
                        <div class="row row--15">
                            <div class="col-lg-6 col-md-6 col-12 mt--30">
                                <div class="rainbow-card undefined">
                                    <div class="inner">
                                        <div class="thumbnail">
                                            <a class="image" href="{{ route('blogDetails') }}"><img src="{{ asset('assets/images/blog/blog-01.png') }}" alt="Blog Image">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <ul class="rainbow-meta-list">
                                                <li><i class="fa-sharp fa-regular fa-calendar-days icon-left"></i>
                                                    10 Dec 2024</li>
                                                <li class="separator"></li>
                                                <li class="catagory-meta"><a href="#">Technology</a></li>
                                            </ul>
                                            <h4 class="title"><a href="{{ route('blogDetails') }}">Best Corporate
                                                    Tips
                                                    You Will Read This Year.
                                                </a>
                                            </h4>
                                            <p class="description">Implement user authentication to provide
                                                personalized experiences </p>
                                            <a class="btn-read-more border-transparent" href="#"><span>Read More
                                                    <i class="fa-sharp fa-regular fa-arrow-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mt--30">
                                <div class="rainbow-card undefined">
                                    <div class="inner">
                                        <div class="thumbnail">
                                            <a class="image" href="{{ route('blogDetails') }}"><img src="{{ asset('assets/images/blog/blog-02.png') }}" alt="Blog Image">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <ul class="rainbow-meta-list">
                                                <li><i class="fa-sharp fa-regular fa-calendar-days icon-left"></i>
                                                    10 Dec 2024</li>
                                                <li class="separator"></li>
                                                <li class="catagory-meta"><a href="#">Technology</a></li>
                                            </ul>
                                            <h4 class="title"><a href="{{ route('blogDetails') }}">Best Corporate
                                                    Tips
                                                    You Will Read This Year.
                                                </a>
                                            </h4>
                                            <p class="description">Implement user authentication to provide
                                                personalized experiences </p>
                                            <a class="btn-read-more border-transparent" href="#"><span>Read More
                                                    <i class="fa-sharp fa-regular fa-arrow-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mt--30">
                                <div class="rainbow-card undefined">
                                    <div class="inner">
                                        <div class="thumbnail">
                                            <a class="image" href="{{ route('blogDetails') }}"><img src="{{ asset('assets/images/blog/blog-03.png') }}" alt="Blog Image">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <ul class="rainbow-meta-list">
                                                <li><i class="fa-sharp fa-regular fa-calendar-days icon-left"></i>
                                                    10 Dec 2024</li>
                                                <li class="separator"></li>
                                                <li class="catagory-meta"><a href="#">Technology</a></li>
                                            </ul>
                                            <h4 class="title"><a href="{{ route('blogDetails') }}">Best Corporate
                                                    Tips
                                                    You Will Read This Year.
                                                </a>
                                            </h4>
                                            <p class="description">Implement user authentication to provide
                                                personalized experiences </p>
                                            <a class="btn-read-more border-transparent" href="#"><span>Read More
                                                    <i class="fa-sharp fa-regular fa-arrow-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mt--30">
                                <div class="rainbow-card undefined">
                                    <div class="inner">
                                        <div class="thumbnail">
                                            <a class="image" href="{{ route('blogDetails') }}"><img src="{{ asset('assets/images/blog/blog-04.png') }}" alt="Blog Image">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <ul class="rainbow-meta-list">
                                                <li><i class="fa-sharp fa-regular fa-calendar-days icon-left"></i>
                                                    10 Dec 2024</li>
                                                <li class="separator"></li>
                                                <li class="catagory-meta"><a href="#">Technology</a></li>
                                            </ul>
                                            <h4 class="title"><a href="{{ route('blogDetails') }}">Best Corporate
                                                    Tips
                                                    You Will Read This Year.
                                                </a>
                                            </h4>
                                            <p class="description">Implement user authentication to provide
                                                personalized experiences </p>
                                            <a class="btn-read-more border-transparent" href="#"><span>Read More
                                                    <i class="fa-sharp fa-regular fa-arrow-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mt--30">
                                <div class="rainbow-card undefined">
                                    <div class="inner">
                                        <div class="thumbnail">
                                            <a class="image" href="{{ route('blogDetails') }}"><img src="{{ asset('assets/images/blog/blog-05.png') }}" alt="Blog Image">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <ul class="rainbow-meta-list">
                                                <li><i class="fa-sharp fa-regular fa-calendar-days icon-left"></i>
                                                    10 Dec 2024</li>
                                                <li class="separator"></li>
                                                <li class="catagory-meta"><a href="#">Technology</a></li>
                                            </ul>
                                            <h4 class="title"><a href="{{ route('blogDetails') }}">Best Corporate
                                                    Tips
                                                    You Will Read This Year.
                                                </a>
                                            </h4>
                                            <p class="description">Implement user authentication to provide
                                                personalized experiences </p>
                                            <a class="btn-read-more border-transparent" href="#"><span>Read More
                                                    <i class="fa-sharp fa-regular fa-arrow-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mt--30">
                                <div class="rainbow-card undefined">
                                    <div class="inner">
                                        <div class="thumbnail">
                                            <a class="image" href="{{ route('blogDetails') }}"><img src="{{ asset('assets/images/blog/blog-06.png') }}" alt="Blog Image">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <ul class="rainbow-meta-list">
                                                <li><i class="fa-sharp fa-regular fa-calendar-days icon-left"></i>
                                                    10 Dec 2024</li>
                                                <li class="separator"></li>
                                                <li class="catagory-meta"><a href="#">Technology</a></li>
                                            </ul>
                                            <h4 class="title"><a href="{{ route('blogDetails') }}">Best Corporate
                                                    Tips
                                                    You Will Read This Year.
                                                </a>
                                            </h4>
                                            <p class="description">Implement user authentication to provide
                                                personalized experiences </p>
                                            <a class="btn-read-more border-transparent" href="#"><span>Read More
                                                    <i class="fa-sharp fa-regular fa-arrow-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mt--30">
                                <div class="rainbow-card undefined">
                                    <div class="inner">
                                        <div class="thumbnail">
                                            <a class="image" href="{{ route('blogDetails') }}"><img src="{{ asset('assets/images/blog/blog-07.png') }}" alt="Blog Image">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <ul class="rainbow-meta-list">
                                                <li><i class="fa-sharp fa-regular fa-calendar-days icon-left"></i>
                                                    10 Dec 2024</li>
                                                <li class="separator"></li>
                                                <li class="catagory-meta"><a href="#">Technology</a></li>
                                            </ul>
                                            <h4 class="title"><a href="{{ route('blogDetails') }}">Best Corporate
                                                    Tips
                                                    You Will Read This Year.
                                                </a>
                                            </h4>
                                            <p class="description">Implement user authentication to provide
                                                personalized experiences </p>
                                            <a class="btn-read-more border-transparent" href="#"><span>Read More
                                                    <i class="fa-sharp fa-regular fa-arrow-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mt--30">
                                <div class="rainbow-card undefined">
                                    <div class="inner">
                                        <div class="thumbnail">
                                            <a class="image" href="{{ route('blogDetails') }}"><img src="{{ asset('assets/images/blog/blog-08.png') }}" alt="Blog Image">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <ul class="rainbow-meta-list">
                                                <li><i class="fa-sharp fa-regular fa-calendar-days icon-left"></i>
                                                    10 Dec 2024</li>
                                                <li class="separator"></li>
                                                <li class="catagory-meta"><a href="#">Technology</a></li>
                                            </ul>
                                            <h4 class="title"><a href="{{ route('blogDetails') }}">Best Corporate
                                                    Tips
                                                    You Will Read This Year.
                                                </a>
                                            </h4>
                                            <p class="description">Implement user authentication to provide
                                                personalized experiences </p>
                                            <a class="btn-read-more border-transparent" href="#"><span>Read More
                                                    <i class="fa-sharp fa-regular fa-arrow-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <div class="rainbow-load-more text-center mt--60"><button class="btn btn-default btn-icon"><span>View More Post<span class="icon">
                                        <i class="feather-loader"></i>
                                    </span></span></button></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt_md--40 mt_sm--40">
                <aside class="rainbow-sidebar">
                    <div class="rbt-single-widget widget_search mt--40">
                        <div class="inner">
                            <form class="blog-search" action="#"><input type="text" placeholder="Search ...">
                                <button class="search-button">
                                    <i class="feather-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="rbt-single-widget widget_categories mt--40">
                        <h3 class="title">Categories</h3>
                        <div class="inner">
                            <ul class="category-list ">
                                <li><a href="#"><span class="left-content">Development</span><span class="count-text">3</span></a></li>
                                <li><a href="#"><span class="left-content">Company</span><span class="count-text">3</span></a></li>
                                <li><a href="#"><span class="left-content">Marketing</span><span class="count-text">2</span></a></li>
                                <li><a href="#"><span class="left-content">UX
                                            Design</span><span class="count-text">5</span></a></li>
                                <li><a href="#"><span class="left-content">Business</span><span class="count-text">2</span></a></li>
                                <li><a href="#"><span class="left-content">App
                                            Development</span><span class="count-text">3</span></a></li>
                                <li><a href="#"><span class="left-content">Application</span><span class="count-text">2</span></a></li>
                                <li><a href="#"><span class="left-content">Art</span><span class="count-text">2</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="rbt-single-widget widget_recent_entries mt--40">
                        <h3 class="title">Post</h3>
                        <div class="inner">
                            <ul>
                                <li>
                                    <div class="list-blog-sm">
                                        <div class="img">
                                            <img src="{{ asset('assets/images/blog/blog-07.png') }}" alt="Blog">
                                        </div>
                                        <div class="content">
                                            <a class="d-block" href="{{ route('blogDetails') }}">10 ways to supercharge
                                                startup with Al
                                            </a>
                                            <span class="cate">AI Technology</span>
                                        </div>
                                    </div>

                                </li>
                                <li>
                                    <div class="list-blog-sm">
                                        <div class="img">
                                            <img src="{{ asset('assets/images/blog/blog-08.png') }}" alt="Blog">
                                        </div>
                                        <div class="content">
                                            <a class="d-block" href="{{ route('blogDetails') }}">Best Corporate Tips You
                                                Will
                                                Read This Year.
                                            </a>
                                            <span class="cate">Development</span>
                                        </div>
                                    </div>

                                </li>
                                <li>
                                    <div class="list-blog-sm">
                                        <div class="img">
                                            <img src="{{ asset('assets/images/blog/blog-09.png') }}" alt="Blog">
                                        </div>
                                        <div class="content">
                                            <a class="d-block" href="{{ route('blogDetails') }}">10 ways to supercharge
                                                startup with Al
                                            </a>
                                            <span class="cate">AI Technology</span>
                                        </div>
                                    </div>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="rbt-single-widget widget_archive mt--40">
                        <h3 class="title">Archives</h3>
                        <div class="inner">
                            <ul>
                                <li><a href="#"><span class="cate">10 Dec 2024</span></a></li>
                                <li><a href="#"><span class="cate">30 Nov 2024</span></a></li>
                                <li><a href="#"><span class="cate">12 Oct 2024</span></a></li>
                                <li><a href="#"><span class="cate">25 Aug 2024</span></a></li>
                                <li><a href="#"><span class="cate">23 Jul 2024</span></a></li>
                                <li><a href="#"><span class="cate">30 Jun 2024</span></a></li>
                                <li><a href="#"><span class="cate">21 Apl 2024</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="rbt-single-widget widget_tag_cloud mt--40">
                        <h3 class="title">Tags</h3>
                        <div class="inner">
                            <div class="tagcloud">
                                <a href="#">Corporate</a>
                                <a href="#">Agency</a>
                                <a href="#">Creative</a>
                                <a href="#">Design</a>
                                <a href="#">Minimal</a>
                                <a href="#">Company</a>
                                <a href="#">Development</a>
                                <a href="#">App Landing</a>
                                <a href="#">Startup</a>
                                <a href="#">App</a>
                                <a href="#">Business</a>
                                <a href="#">Software</a>
                                <a href="#">Landing</a>
                                <a href="#">Art</a>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>

<!-- Start Brand Area -->
<div class="rainbow-brand-area rainbow-section-gap bg-color-1 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title rating-title text-center sal-animate" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                    <div class="rating">
                        <a href="#rating">
                            <i class="fa-sharp fa-solid fa-star"></i>
                        </a>
                        <a href="#rating">
                            <i class="fa-sharp fa-solid fa-star"></i>
                        </a>
                        <a href="#rating">
                            <i class="fa-sharp fa-solid fa-star"></i>
                        </a>
                        <a href="#rating">
                            <i class="fa-sharp fa-solid fa-star"></i>
                        </a>
                        <a href="#rating">
                            <i class="fa-sharp fa-solid fa-star"></i>
                        </a>
                    </div>
                    <p class="subtitle-2 mb--0">Based on 20,000+ reviews on</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mt--10">
                <ul class="brand-list brand-style-2">
                    <li><a href="#"><img src="{{ asset('assets/images/brand/brand-01.png') }}" alt="Brand Image"></a></li>
                    <li><a href="#"><img src="{{ asset('assets/images/brand/brand-02.png') }}" alt="Brand Image"></a></li>
                    <li><a href="#"><img src="{{ asset('assets/images/brand/brand-03.png') }}" alt="Brand Image"></a></li>
                    <li><a href="#"><img src="{{ asset('assets/images/brand/brand-04.png') }}" alt="Brand Image"></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection