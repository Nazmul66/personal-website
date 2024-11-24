@extends('layout.layout2')

@php
    $headTitle = 'Settings';
    $title = 'Our Blog';
    $subTitle = 'Blog';
    $header = 'header3';
@endphp

@section('content')
    <!-- Start Blog Area  -->
    <div class="rainbow-accordion-area rainbow-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="section-title text-center sal-animate" data-sal="slide-up" data-sal-duration="700"
                        data-sal-delay="100">
                        {{-- <h4 class="subtitle "><span class="theme-gradient">Accordion</span></h4> --}}
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
                                        <button class="accordion-button {{ $key != 0 ? 'collapsed' : '' }}" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}"
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
@endsection
