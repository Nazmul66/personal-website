@extends('admin.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('pricing', 'mm-active')

@push('css')
@endpush

@section('content')
    {{-- Breadcrumb --}}

    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0 font-size-18">{{ $title }}</h4>
        <a href="{{ route('admin.pricing.index') }}" class="btn btn-primary waves-effect waves-light">Back</a>
    </div>


    {{-- Body --}}
    <div class="card">
        <div class="card-header">
            <h3>{{ $pricing->title }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Price:</strong> ${{ $pricing->price }}</p>
            <p><strong>Pricing Type:</strong> {{ $pricing->frequency == 1 ? 'Monthly' : 'Yearly' }}</p>
            <p><strong>Duration:</strong> {{ $pricing->duration}} Days</p>
            <p><strong>Link Name:</strong> {{ $pricing->text_link_name }}</p>
            <p><strong>Status:</strong> {{ $pricing->status == 1 ? 'Active' : 'Inactive' }}</p>
            <p><strong>Order Number:</strong> {{ $pricing->order_number ?? 'N/A' }}</p>

            <!-- Plan Features -->
            @if($pricing->features->count() > 0)
                <h5 class="mt-4">Plan Features</h5>
                <ul class="list-group">
                    <li class="list-group-item"> Word limit: {{$pricing->word_limit}}</li>
                    <li class="list-group-item"> Image limit: {{$pricing->image_limit}}</li>
                    <li class="list-group-item"> Minute limit: {{$pricing->minute_limit}}</li>
                    <li class="list-group-item"> Character limit: {{$pricing->character_limit}}</li>
                    <li class="list-group-item"> Page limit: {{$pricing->page_limit}}</li>
                    <li class="list-group-item"> Chatbot limit: {{$pricing->chatbot_limit}}</li>
                    @foreach($pricing->features as $feature)
                        <li class="list-group-item">{{ $feature->feature_name }}</li>
                    @endforeach
                </ul>
            @else
                <p class="mt-4"><em>No features added for this plan.</em></p>
            @endif
        </div>
    </div>
    @endsection

    @push('script')

    @endpush
