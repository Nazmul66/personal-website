@extends('layout.layout1')

@php
    $headTitle = 'Checkout';
    $header = 'header';
@endphp
@push('css')
    <style>
        .checkout_form .dropdown.bootstrap-select.custom-dropdown.form-select.dropup {
            padding: 0px;
        }

        .checkout_form .bootstrap-select>.dropdown-toggle {
            font-size: 16px;
            outline: none !important;
            box-shadow: none !important;
            padding: 10px 11px;
        }

        .checkout_form .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
            width: 264px;
        }

        .checkout_form .dropdown-item.active,
        .dropdown-item:active {
            color: #fff !important;
        }

        .active-dark-mode .checkout_form .bootstrap-select>.dropdown-toggle {
            background: #070710 !important;
            color: #fff;
            border-color: #0f1021;
        }

        .active-dark-mode .checkout_form .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
            background: #070710 !important;
        }

        .active-dark-mode .form-select:before {
            position: absolute;
            font-family: 'FontAwesome';
            content: "\f078";
            color: aliceblue;
            z-index: 55;
            right: 11px;
            top: 2px;
            bottom: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 12px;
        }
    </style>
@endpush

@section('content')
    <!-- Main content -->
    <div class="rbt-main-content mr--0 mb--0">
        <div class="rbt-daynamic-page-content center-width">
            <!-- Dashboard Center Content -->
            <div class="rbt-dashboard-content">
                <div class="banner-area">
                    <!-- ChatenAI small Slider -->
                    <div class="settings-area">
                        <h3 class="title">Checkout</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="checkout-page">
            <div class="row justify-content-center">
                <!-- Plan Information -->
                <div class="col-md-6">
                    <div class="p-2 mb-4 pricing-table-inner bg-flashlight">
                        <div class="card-body">
                            <h4 class="card-title">Plan Details</h4>
                            <p class="m-0"><strong>Plan Name:</strong> {{ $plan->title }}</p>
                            <p class="m-0"><strong>Price:</strong> ${{ $plan->price }}</p>
                            <p class="m-0"><strong>Duration:</strong> {{ $plan->frequency == 1 ? 'Monthly' : 'Yearly' }}
                            </p>
                        </div>
                    </div>

                    <!-- Checkout Form -->
                    <div class="p-2">
                        <div class="mb-3 mt-3">
                            <h4 class="card-title">Checkout Information</h4>
                        </div>
                        <div>
                            <form class="checkout_form" action="{{ route('user.dashboard.process.payment') }}"
                                method="POST" class="rbt-profile-row rbt-default-form row row--15">
                                @csrf
                                <input type="hidden" name="pricing_id" value="{{ $plan->id }}">
                                {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" placeholder="Enter your name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" placeholder="Enter your email" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                        <input id="phone" name="phone" type="tel" value="" placeholder="Phone Number" required
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                </div> --}}
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="payment_method" class="">Payment Method <span
                                                class="text-danger">*</span></label><br>
                                        <select id="" name="payment_method" class="custom-dropdown form-select"
                                            required>
                                            <option value="" class="d-none">Select a payment method</option>
                                            <option value="paypal">PayPal</option>
                                            <option value="stripe">Stripe</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 mt--20">
                                    <div class="form-group mb--0">
                                        <button type="submit" class="btn-default">Proceed to Payment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
