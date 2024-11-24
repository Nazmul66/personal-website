@if (!empty($planMonthly) && $planMonthly->count() > 0)
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($planMonthly as $plan)
                <div class="swiper-slide">
                    <div class="card h-100 border-0 bg-transparent rainbow-pricing style-chatenai overflow-hidden">
                        @if ($plan->is_special)
                            <div class="ribbon">Special Offer</div>
                        @endif
                        <div class="pricing-table-inner bg-flashlight">
                            <div class="pricing-top">
                                <div class="pricing-header">
                                    <h4 class="title">{{ $plan->title }}</h4>
                                    <div class="pricing">
                                        <div class="price-wrapper">
                                            <span class="currency">$</span><span
                                                class="price">{{ $plan->price }}</span>
                                        </div>
                                        <span class="subtitle">USD Per
                                            {{ $plan->frequency == 1 ? 'Month' : 'Year' }}</span>
                                    </div>
                                    <div class="separator-animated mt--30 mb--30"></div>
                                </div>
                                <div class="pricing-body">
                                    <ul class="list-style--1">
                                        <li><i class="feather-check-circle"></i> Word limit:
                                            {{ number_format($plan->word_limit) }}</li>
                                        <li><i class="feather-check-circle"></i> Image limit:
                                            {{ number_format($plan->image_limit) }}</li>
                                        <li><i class="feather-check-circle"></i> Minute limit:
                                            {{ number_format($plan->minute_limit) }}</li>
                                        <li><i class="feather-check-circle"></i> Character limit:
                                            {{ number_format($plan->character_limit) }}</li>
                                        <li><i class="feather-check-circle"></i> Page limit:
                                            {{ number_format($plan->page_limit) }}</li>
                                        <li><i class="feather-check-circle"></i> Chatbot limit:
                                            {{ number_format($plan->chatbot_limit) }}</li>

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
                                {{-- <a class="btn-default btn-border" href="{{ auth()->check() ? route('user.dashboard.checkout', $plan->id) : route('login') }}">
                        {{$plan->text_link_name}}
                    </a> --}}
                                @if (auth()->check() && auth()->user()->current_pan_id == $plan->id)
                                    <a class="btn-default btn-border disabled" href="javascript:void(0);"
                                        style="pointer-events: none; opacity: 0.6;">
                                        Active (Current)
                                    </a>
                                @else
                                    <a class="btn-default btn-border"
                                        href="{{ route('user.dashboard.checkout', $plan->id) }}">
                                        {{ $plan->text_link_name }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
@endif
