@extends('layout.layout1')

@php
    $headTitle = 'Profile Details';
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
                        <h3 class="title">Profile Details</h3>
                        <ul class="user-nav">
                            <li>
                                <a href="{{ route('user.dashboard.profileDetails') }}">
                                    <span>Profile Details</span>
                                </a>
                            </li>
                            {{-- <li>
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
                        </li> --}}
                            <li>
                                <a href="{{ route('user.dashboard.plansBilling') }}">
                                    <span>Plans and Billing</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('user.dashboard.transactions')}}" class="@yield('transactions')">
                                    <span>Purchase History</span>
                                </a>
                            </li>
                            {{-- <li>
                            <a href="{{ route('sessions') }}">
                                <span>Sessions</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('application') }}">
                                <span>Application</span>
                            </a>
                        </li> --}}
                        </ul>
                    </div>
                </div>
                <div class="content-page pb--50">
                    <div class="chat-box-list">

                        <!-- ChatenAI Settings Settings -->
                        <div
                            class="single-settings-box profiledetails-box top-flashlight light-xl leftside overflow-hidden">
                            <div class="profiledetails-tab">
                                <div class="advance-tab-button mb--30">
                                    <ul class="nav nav-tabs tab-button-style-2 justify-content-start" id="settinsTab-4"
                                        role="tablist">
                                        <li role="presentation">
                                            <a href="#" class="tab-button {{ session('passwordTabOpen') || session('delAccountTabOpen') ? '' : 'active' }}" id="profile-tab"
                                                data-bs-toggle="tab" data-bs-target="#profile" role="tab"
                                                aria-controls="profile" aria-selected="true">
                                                <span class="title">Profile</span>
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#" class="tab-button {{ session('passwordTabOpen') ? 'active' : '' }}" id="password-tab" data-bs-toggle="tab"
                                                data-bs-target="#password" role="tab" aria-controls="password"
                                                aria-selected="false">
                                                <span class="title">Password</span>
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#" class="tab-button {{ session('delAccountTabOpen') ? 'active' : '' }}" id="del-account-tab" data-bs-toggle="tab"
                                                data-bs-target="#delaccount" role="tab" aria-controls="delaccount"
                                                aria-selected="false">
                                                <span class="title">Delete Account</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane fade {{ session('passwordTabOpen') || session('delAccountTabOpen') ? '' : 'active show' }}" id="profile" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        <!-- Start Profile Row  -->
                                        <form action="{{route('user.dashboard.profile.update')}}" method="POST" class="rbt-profile-row rbt-default-form row row--15">
                                            @csrf
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">First Name <span class="text-danger">*</span></label>
                                                    <input id="name" name="name" type="text" placeholder="First Number" value="{{ $user->name }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="last_name">Last Name</label>
                                                    <input id="last_name" name="last_name" type="text" placeholder="Last Number" value="{{ $user->last_name }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                                    <input id="username" name="username" type="text" placeholder="Username" value="{{ $user->username }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                                    <input id="phone" name="phone" type="tel" value="{{ $user->phone }}" placeholder="Phone Number" required
                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="bio">Bio</label>
                                                    <textarea name="bio" id="bio" cols="20" rows="5" placeholder="Bio">{{ $user->bio }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 mt--20">
                                                <div class="form-group mb--0">
                                                    <button type="submit" class="btn-default" >Update Info</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- End Profile Row  -->
                                    </div>
                                    <div class="tab-pane fade {{ session('passwordTabOpen') ? 'active show' : '' }}" id="password" role="tabpanel"
                                        aria-labelledby="password-tab">
                                        <!-- Start Profile Row  -->
                                        <form action="{{route('user.dashboard.password.update')}}" method="post" class="rbt-profile-row rbt-default-form row row--15">
                                            @csrf
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="currentpassword">Current Password <span class="text-danger">*</span></label>
                                                    <input name="current_password" id="currentpassword" type="password"
                                                        placeholder="Current Password" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="newpassword">New Password <span class="text-danger">*</span></label>
                                                    <input name="password" id="password-field" type="password" placeholder="New Password" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="retypenewpassword">Re-type New Password <span class="text-danger">*</span></label>
                                                    <input name="confirm_password" id="confirm_password" type="password"
                                                        placeholder="Re-type New Password" required>
                                                </div>
                                            </div>
                                            <div class="col-12 mt--20">
                                                <div class="form-group mb--0">
                                                    <button class="btn-default" type="submit">Update Password</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- End Profile Row  -->
                                    </div>
                                    <div class="tab-pane fade {{ session('delAccountTabOpen') ? 'active show' : '' }}" id="delaccount" role="tabpanel"
                                        aria-labelledby="del-account-tab">
                                        <!-- Start Profile Row  -->
                                        <form action="{{route('user.profile.delete')}}" method="POST" class="rbt-profile-row rbt-default-form row row--15">
                                            @csrf
                                            <div class="col-11 text-Center">
                                                <p class="mb--20"> <strong>Warning: </strong>Deleting your account will
                                                    permanently erase all your data and cannot be reversed. This includes
                                                    your profile, conversations, comments, and any other info linked to your
                                                    account. Are you sure you want to go ahead with deleting your account?
                                                    Enter your password to confirm.</p>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="enterpassword">Your Password <span class="text-danger">*</span></label>
                                                    <input id="enterpassword" name="password" type="password"
                                                        placeholder="Current Password" required>
                                                </div>
                                            </div>
                                            <div class="col-12 mt--20">
                                                <div class="form-group mb--0">
                                                    <button class="btn-default" type="submit">
                                                        <i class="feather-trash-2"></i>
                                                        Delete Accont
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- End Profile Row  -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('script')
@endpush
