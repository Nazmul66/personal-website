@extends('layout.layout4')

@php
    $headTitle = 'Log In';
    $header = 'header2';
@endphp

@section('content')
    <!-- Start Sign up Area  -->
    <div class="signup-area rainbow-section-gapTop-big" data-black-overlay="2">
        <div class="sign-up-wrapper rainbow-section-gap">
            <div class="sign-up-box bg-flashlight">
                <div class="signup-box-top top-flashlight light-xl">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset(getSetting()->site_logo) }}" alt="{{ getSetting()->site_name }}"
                            style="width: 18%; display: block; margin: 0 auto;">
                    </a>
                </div>
                <div class="separator-animated animated-true"></div>
                <div class="signup-box-bottom">
                    <div class="signup-box-content">
                        <h4 class="title">Welcome Back!</h4>
                        <div class="">
                            <a class="btn-default btn-border" href="{{ route('auth.discord') }}">
                                <span class="icon-left"><img src="{{ asset('assets/images/sign-up/discord.png') }}"
                                        alt="Google Icon"></span>Login with Discord
                            </a>
                            {{-- <a class="btn-default btn-border" href="#">
                            <span class="icon-left"><img src="{{ asset('assets/images/sign-up/facebook.png') }}" alt="Google Icon"></span>Login with Facebook
                        </a> --}}
                        </div>
                        {{-- <div class="text-social-area">
                        <hr>
                        <span>Or continue with</span>
                        <hr>
                    </div>
                    <form>
                        <div class="input-section mail-section">
                            <div class="icon"><i class="feather-mail"></i></div>
                            <input type="email" placeholder="Enter email address">
                        </div>
                        <div class="input-section password-section">
                            <div class="icon"><i class="feather-lock"></i></div>
                            <input type="password" placeholder="Password">
                        </div>
                        <div class="forget-text"><a class="btn-read-more" href="#"><span>Forgot password</span></a></div>
                        <button type="submit" class="btn-default">Sign In</button>
                    </form> --}}
                    </div>
                    {{-- <div class="signup-box-footer">
                    <div class="bottom-text">
                        Don't have an account? <a class="btn-read-more" href="{{ asset('signup') }}"><span>Sign Up</span></a>
                    </div>
                </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- End Sign up Area  -->
@endsection
@push('script')
    {!! Toastr::message() !!}
    <script>
        @if (session('status'))
            toastr.success('{{ session('status') }}', 'Success', {
                closeButton: true,
                progressBar: true,
            });
        @endif

        @if ($errors->has('ip_error'))
            toastr.error('{{ $errors->first('ip_error') }}', 'Access Denied', {
                closeButton: true,
                progressBar: true,
            });
        @elseif ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}', 'Error', {
                    closeButton: true,
                    progressBar: true,
                });
            @endforeach
        @endif
    </script>
@endpush
