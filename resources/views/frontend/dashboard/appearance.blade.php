@extends('layout.layout1')

@php
$headTitle = 'Settings';
$header = 'header';
@endphp

@section('content')

<!-- Main content -->
<div class="rbt-main-content mr--0 mb--0">
    <div class="rbt-daynamic-page-content center-width">

        <!-- Dashboard Center Content -->
        <div class="rbt-dashboard-content">
            <div class="banner-area">
                <!-- ChatenAI small Slider -->
                <div class="settings-area">
                    <h3 class="title">Settings</h3>
                    <ul class="user-nav">
                        <li>
                            <a href="{{ route('profileDetails') }}">
                                <span>Profile Details</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('notification') }}">
                                <span>Notification</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('chatExport') }}">
                                <span>Chat Export</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('appearance') }}">
                                <span>Apperance</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('plansBilling') }}">
                                <span>Plans and Billing</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('sessions') }}">
                                <span>Sessions</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('application') }}">
                                <span>Application</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="content-page pb--50">
                <div class="chat-box-list">
                    <!-- ChatenAI Apearance Select -->
                    <div class="single-settings-box top-flashlight light-xl leftside">
                        <h4 class="title">Appearance</h4>
                        <div class="switcher-btn-grp">
                            <button class="dark-switcher active">
                                <img src="{{ asset('assets/images/switcher-img/dark.png') }}" alt="Switcher Image">
                                <span class="text">Dark Mode</span>
                            </button>
                            <button class="light-switcher disabled" disabled>
                                <img src="{{ asset('assets/images/switcher-img/light.png') }}" alt="Switcher Image">
                                <span class="text">Light Mode</span>
                                <s class="rainbow-badge-card badge-sm position-top-right">Coming</s>
                            </button>
                        </div>
                    </div>

                    <!-- ChatenAI Language Select -->
                    <div class="single-settings-box top-flashlight light-xl leftside">
                        <h4 class="title">Languages</h4>
                        <div class="select-area">
                            <h6 class="text">System Language</h6>

                            <div class="rbt-modern-select bg-transparent height-45">
                                <select>
                                    <option data-content="<img class='left-image' src='{{ asset('assets/images/icons/en-us.png') }}' alt='Language Images'> English">English</option>
                                    <option data-content="<img class='left-image' src='{{ asset('assets/images/icons/fr.png') }}' alt='Language Images'> Spanish">Spanish</option>
                                    <option data-content="<img class='left-image' src='{{ asset('assets/images/icons/en-us.png') }}' alt='Language Images'> Italiic">Italic</option>
                                    <option data-content="<img class='left-image' src='{{ asset('assets/images/icons/fr.png') }}' alt='Language Images' > French">French</option>
                                </select>
                            </div>
                        </div>
                        <div class="select-area mt--20">
                            <h6 class="text">Generate Language</h6>

                            <div class="rbt-modern-select bg-transparent height-45">
                                <select>
                                    <option data-content="<img class='left-image' src='{{ asset('assets/images/icons/en-us.png') }}' alt='Language Images'> English">English</option>
                                    <option data-content="<img class='left-image' src='{{ asset('assets/images/icons/fr.png') }}' alt='Language Images'> Spanish">Spanish</option>
                                    <option data-content="<img class='left-image' src='{{ asset('assets/images/icons/en-us.png') }}' alt='Language Images'> Italiic">Italic</option>
                                    <option selected data-content="<img class='left-image' src='{{ asset('assets/images/icons/fr.png') }}' alt='Language Images' > French">French</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection