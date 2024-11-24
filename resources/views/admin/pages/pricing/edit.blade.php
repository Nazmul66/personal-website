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
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">

                    <form action="{{ route('admin.pricing.update', $pricing->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Pricing Name <span class="text-danger">*</span></label>
                                    <input name="title" id="title" placeholder="Write Pricing Name...."
                                           type="text" class="form-control" value="{{ old('title', $pricing->title) }}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                                    <input name="price" id="price" class="form-control"
                                           placeholder="Write price....." type="number" step=".01" min="0"
                                           value="{{ old('price', $pricing->price) }}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="frequency" class="form-label">Pricing Duration <span class="text-danger">*</span></label>
                                    <select name="frequency" id="frequency" class="form-control">
                                        <option value="1" {{ old('frequency', $pricing->frequency) == 1 ? 'selected' : '' }}>Monthly</option>
                                        <option value="2" {{ old('frequency', $pricing->frequency) == 2 ? 'selected' : '' }}>Yearly</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="text_link_name" class="form-label">Text Link Name <span class="text-danger">*</span></label>
                                    <input name="text_link_name" id="text_link_name" placeholder="Text Link Name....."
                                           type="text" class="form-control" value="{{ old('text_link_name', $pricing->text_link_name) }}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="order_number" class="form-label">Order Number</label>
                                    <input name="order_number" id="order_number" placeholder="Order number....."
                                           type="text" class="form-control" value="{{ old('order_number', $pricing->order_number) }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control form-select">
                                        <option value="1" {{ old('status', $pricing->status) == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status', $pricing->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="word_limit" class="form-label">Word limit <span
                                            class="text-danger">*</span></label>
                                    <input name="word_limit" id="word_limit" placeholder="Word limit....."
                                        type="number" class="form-control" value="{{ old('word_limit', $pricing->word_limit) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="image_limit" class="form-label">Image limit <span
                                            class="text-danger">*</span></label>
                                    <input name="image_limit" id="image_limit" placeholder="Image limit....."
                                        type="number" class="form-control" value="{{ old('image_limit', $pricing->image_limit) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="minute_limit" class="form-label">Minute limit <span
                                            class="text-danger">*</span></label>
                                    <input name="minute_limit" id="minute_limit" placeholder="Minute limit....."
                                        type="number" class="form-control" value="{{ old('minute_limit', $pricing->minute_limit) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="character_limit" class="form-label">Character limit <span
                                            class="text-danger">*</span></label>
                                    <input name="character_limit" id="character_limit" placeholder="Page limit....."
                                        type="number" class="form-control" value="{{ old('character_limit', $pricing->character_limit) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="page_limit" class="form-label">Page limit <span
                                            class="text-danger">*</span></label>
                                    <input name="page_limit" id="page_limit" placeholder="page limit....."
                                        type="number" class="form-control" value="{{ old('page_limit', $pricing->page_limit) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="chatbot_limit" class="form-label">Chatbot limit <span
                                            class="text-danger">*</span></label>
                                    <input name="chatbot_limit" id="chatbot_limit" placeholder="Chatbot limit....."
                                        type="number" class="form-control" value="{{ old('chatbot_limit', $pricing->chatbot_limit) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="chatbot_limit" class="form-label">Is Special </label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="is_special" value="1" role="switch" id="flexSwitchCheckDefault"
                                    {{ old('is_special', $pricing->is_special) == 1 ? 'checked' : '' }}>
                                </div>
                                    {{-- <input name="chatbot_limit" id="chatbot_limit" placeholder="Chatbot limit....."
                                        type="text" class="form-control" value="{{ old('chatbot_limit') }}"> --}}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="form-group">
                                    <div class="">
                                        <div class="row gy-3 feature-group">
                                            @foreach ($pricing->features as $feature)
                                                <div class="col-md-4 feature-item">
                                                    <label for="" class="form-label">Plan Feature</label>
                                                    <div class="input-group">
                                                        <input type="text" name="feature_name[]" class="form-control" placeholder="Plan Feature"
                                                               value="{{ old('feature_name.' . $loop->index, $feature->feature_name) }}" required>
                                                        <button type="button" class="removeFeature btn btn-xs btn-danger">Remove</button>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- Template for dynamically added features -->
                                            {{-- <div class="col-md-4 d-none feature-template">
                                                <label for="" class="form-label">Plan Feature</label>
                                                <div class="input-group">
                                                    <input type="text" name="feature_name[]" class="form-control" placeholder="Plan Feature" required>
                                                    <button type="button" class="removeFeature btn btn-xs btn-danger">Remove</button>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="text-right mt-3">
                                        <button type="button" class="addMoreFeature btn btn-xs btn-primary">Add More Feature</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-info waves-effect waves-light w-md">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @push('script')
        <script>
            $('#price_bundle').on('change', function() {
                // console.log($(this).val());

                if ($(this).val() === 'paid') {
                    $('#price').removeClass('d-none');
                } else {
                    $('#price').addClass('d-none');
                }
            })
        </script>
        <script>
            $(document).ready(function () {
                // Add new feature field on click
                $('.addMoreFeature').click(function () {
                    let newFeature = `
                     <div class="col-md-4 feature-item">
                        <label for="" class="form-label">Plan Feature</label>
                        <div class="input-group">
                            <input type="text" name="feature_name[]" class="form-control" placeholder="Plan Feature" required>
                            <button type="button" class="removeFeature btn btn-xs btn-danger input-group-text">Remove</button>
                        </div>
                    </div>`;

                    $('.feature-group').append(newFeature);
                });

                // Remove feature field on click
                $(document).on('click', '.removeFeature', function () {
                    $(this).closest('.feature-item').remove();
                });
            });
        </script>
    @endpush
