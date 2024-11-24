@extends('layout.layout1')

@php
$headTitle = 'Dashboard';
@endphp

@section('content')

<!-- Main content -->
<div class="rbt-main-content mr--0">
    <div class="rbt-daynamic-page-content">

        <!-- Dashboard Center Content -->
        <div class="rbt-dashboard-content">
            <div class="banner-area">
                <!-- ChatenAI small Slider -->
                <div class="rainbow-slider-section slick-grid-15 rainbow-slick-dot sm-slider-carosel-activation">
                    <div class="chatenai-small-slider slide-single-layout">
                        <div class="inner bg-one">
                            <div class="content">
                                <h4 class="title">Frequently Asked Questions</h4>
                                <p class="desc">Explore our comprehensive repository</p>
                            </div>
                            <div class="img-section">
                                <img src="assets/images/slider-bg/slider-sm-01.png" alt="sm slider img">
                            </div>
                        </div>
                    </div>
                    <div class="chatenai-small-slider slide-single-layout">
                        <div class="inner bg-three">
                            <div class="content">
                                <h4 class="title">Cognitive Services Hub</h4>
                                <p class="desc">Immerse yourself in the world of cutting-edge</p>
                            </div>
                            <div class="img-section">
                                <img src="assets/images/slider-bg/slider-sm-03.png" alt="sm slider img">
                            </div>
                        </div>
                    </div>
                    <div class="chatenai-small-slider slide-single-layout">
                        <div class="inner bg-four">
                            <div class="content">
                                <h4 class="title">Best Quantum AI Services</h4>
                                <p class="desc">Elevate your ventures with our AI Services</p>
                            </div>
                            <div class="img-section">
                                <img src="assets/images/slider-bg/slider-sm-02.png" alt="sm slider img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-page">
                <div class="chat-box-list">

                    <div class="welcome-wrapper">
                        <div class="content-section">
                            <h4 class="title">👋 Welcome, Adamma</h4>
                        </div>
                        <div class="btn-section">
                            <a class="btn-default bg-solid-primary" data-bs-toggle="modal" data-bs-target="#newchatModal">
                                <span class="icon"><i class="feather-plus-circle"></i></span>
                                <span>New Chat</span>
                            </a>
                        </div>
                    </div>

                    <!-- ChatenAI Generator -->
                    <div class="rainbow-generartor-section rainbow-section-gap">
                        <div class="section-title text-center sal-animate" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                            <h4 class="subtitle "><span class="theme-gradient">ChaetenAI</span></h4>
                            <h2 class="title w-600 mb--20">Unleashing the Power of ChatAI</h2>
                            <p class="description b1">We provide Mastering the Art of ChatAI generate your
                                text <br>Pioneering Conversations with AI.</p>
                        </div>
                        <div class="genarator-section">
                            <ul class="genarator-card-group">
                                <li>
                                    <a href="text-generator" class="genarator-card">
                                        <div class="inner">
                                            <div class="left-align">
                                                <div class="img-bar">
                                                    <img src="assets/images/generator-icon/text.png" alt="AI Generator">
                                                </div>
                                                <h5 class="title">Text Generator</h5>
                                            </div>
                                            <div class="right-align">
                                                <div class="icon-bar"><i data-feather="arrow-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="image-generator" class="genarator-card">
                                        <div class="inner">
                                            <div class="left-align">
                                                <div class="img-bar">
                                                    <img src="assets/images/generator-icon/photo.png" alt="AI Generator">
                                                </div>
                                                <h5 class="title">Image Generator</h5>
                                            </div>
                                            <div class="right-align">
                                                <div class="icon-bar"><i data-feather="arrow-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="image-editor" class="genarator-card">
                                        <div class="inner">
                                            <div class="left-align">
                                                <div class="img-bar">
                                                    <img src="assets/images/generator-icon/photo-editor.png" alt="AI Generator">
                                                </div>
                                                <h5 class="title">Photo Editor</h5>
                                            </div>
                                            <div class="right-align">
                                                <div class="icon-bar"><i data-feather="arrow-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="code-generator" class="genarator-card">
                                        <div class="inner">
                                            <div class="left-align">
                                                <div class="img-bar">
                                                    <img src="assets/images/generator-icon/code-editor.png" alt="AI Generator">
                                                </div>
                                                <h5 class="title">Code Generator</h5>
                                            </div>
                                            <div class="right-align">
                                                <div class="icon-bar"><i data-feather="arrow-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="text-generator" class="genarator-card">
                                        <div class="inner">
                                            <div class="left-align">
                                                <div class="img-bar">
                                                    <img src="assets/images/generator-icon/text-voice.png" alt="AI Generator">
                                                </div>
                                                <h5 class="title">Text to speech</h5>
                                            </div>
                                            <div class="right-align">
                                                <div class="icon-bar"><i data-feather="arrow-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="text-generator" class="genarator-card">
                                        <div class="inner">
                                            <div class="left-align">
                                                <div class="img-bar">
                                                    <img src="assets/images/generator-icon/voice.png" alt="AI Generator">
                                                </div>
                                                <h5 class="title">Speech to text</h5>
                                            </div>
                                            <div class="right-align">
                                                <div class="icon-bar"><i data-feather="arrow-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="vedio-generator" class="genarator-card">
                                        <div class="inner">
                                            <div class="left-align">
                                                <div class="img-bar">
                                                    <img src="assets/images/generator-icon/video-camera.png" alt="AI Generator">
                                                </div>
                                                <h5 class="title">Vedio Generator</h5>
                                            </div>
                                            <div class="right-align">
                                                <div class="icon-bar"><i data-feather="arrow-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="genarator-card disabled" tabindex="-1">
                                        <div class="inner">
                                            <div class="left-align">
                                                <div class="img-bar">
                                                    <img src="assets/images/generator-icon/website-design.png" alt="AI Generator">
                                                </div>
                                                <h5 class="title">Website Generator</h5>
                                            </div>
                                            <div class="right-align">
                                                <span class="rainbow-badge-card">Coming</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="code-generator" class="genarator-card">
                                        <div class="inner">
                                            <div class="left-align">
                                                <div class="img-bar">
                                                    <img src="assets/images/generator-icon/code-editor.png" alt="AI Generator">
                                                </div>
                                                <h5 class="title">HTML Generator</h5>
                                            </div>
                                            <div class="right-align">
                                                <div class="icon-bar"><i data-feather="arrow-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="text-generator" class="genarator-card disabled" tabindex="-1">
                                        <div class="inner">
                                            <div class="left-align">
                                                <div class="img-bar">
                                                    <img src="assets/images/generator-icon/document.png" alt="AI Generator">
                                                </div>
                                                <h5 class="title">Chat with Documents</h5>
                                            </div>
                                            <div class="right-align">
                                                <span class="rainbow-badge-card">Coming</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="email-generator" class="genarator-card">
                                        <div class="inner">
                                            <div class="left-align">
                                                <div class="img-bar">
                                                    <img src="assets/images/generator-icon/email.png" alt="AI Generator">
                                                </div>
                                                <h5 class="title">Email Writer</h5>
                                            </div>
                                            <div class="right-align">
                                                <div class="icon-bar"><i data-feather="arrow-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="genarator-card disabled" tabindex="-1">
                                        <div class="inner">
                                            <div class="left-align">
                                                <div class="img-bar">
                                                    <img src="assets/images/generator-icon/lyrics.png" alt="AI Generator">
                                                </div>
                                                <h5 class="title">Lyrics Generator</h5>
                                            </div>
                                            <div class="right-align">
                                                <span class="rainbow-badge-card">Coming</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="rbt-static-bar collapse-width">
                <form class="new-chat-form border-gradient">
                    <textarea rows="1" placeholder="Send a message..."></textarea>
                    <div class="left-icons">
                        <div title="ChatenAI" class="form-icon icon-gpt">
                            <i class="feather-aperture"></i>
                        </div>
                    </div>
                    <div class="right-icons">
                        <div class="form-icon icon-plus" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Choose File">
                            <input type="file" class="input-file" name="myfile" multiple>
                            <i class="feather-plus-circle"></i>
                        </div>
                        <button class="form-icon icon-mic" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Voice Search">
                            <i class="feather-mic"></i>
                        </button>
                        <button class="form-icon icon-send" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Send message">
                            <i class="feather-send"></i>
                        </button>
                    </div>
                </form>
                <ul class="staticbar-btn-grp d-none d-md-flex">
                    <li>
                        <button class="btn-default btn-small btn-border"><span>Ask Tough Question</span>
                        </button>
                    </li>
                    <li>
                        <button class="btn-default btn-small btn-border"><span>Create Image Artwork</span>
                        </button>
                    </li>
                    <li>
                        <button class="btn-default btn-small btn-border"><span>Image Editor Options</span>
                        </button>
                    </li>
                    <li>
                        <button class="btn-default btn-small btn-border"><span>Give Voice command</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>

@endsection