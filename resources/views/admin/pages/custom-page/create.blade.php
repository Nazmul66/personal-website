@extends('admin.layouts.master')

@section('cpage_list', 'mm-active')

@section('title')
    {{ 'Create Page' }}
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <style>

    </style>
@endpush

@php
    $menuTypes = config('static_array.menu_type');
    $menuSections = config('static_array.footer_menu');
@endphp

@section('content')


    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0 font-size-18">Create Page</h4>
        <a href="{{ route('admin.cpage.index') }}" class="btn btn-primary waves-effect waves-light">Back</a>
    </div>


    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">

                    <form action="{{ route('admin.cpage.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Page Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="title" id="title" placeholder="Write Your Title...."
                                        class="form-control" value="{{ old('title') }}" oninput="generateSlug()" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="url_slug" class="form-label">Page Slug <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="url_slug" id="url_slug"
                                        placeholder="Write Your Url Slug...." class="form-control"
                                        value="{{ old('url_slug') }}" required>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-3">
                                <div class="mb-3">
                                    <label for="menu_type" class="form-label">Menu Type<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control form-select" name="menu_type" id="menu_type" required>
                                        <option value="" class="d-none">Select Menu Type</option>
                                        @foreach ($menuTypes as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-3" id="footer_menu_section" style="display: none;">
                                <div class="mb-3">
                                    <label for="section_type" class="form-label">Footer Menu Section<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control form-select" name="section_type" id="section_type">
                                        <option value="" class="d-none">Select Section Type</option>
                                        @foreach ($menuSections as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-3">
                                <div class="mb-3">
                                    <label for="is_active" class="form-label">Status <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control form-select" name="is_active" id="is_active">
                                        <option selected="" value="1">Active</option>
                                        <option value="0">Inactive
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="body" class="form-label">Description <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" name="body" id="description" placeholder="Write here...." rows="8">{{ old('body') }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="meta_title" class="form-label">Meta Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="meta_title" id="meta_title" placeholder="Meta Title...."
                                        class="form-control" value="{{ old('meta_title') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="meta_keywords" class="form-label">Meta Keywords <span
                                        class="text-danger">*</span></label>
                                <input name="meta_keywords" id="meta_keywords" type="text"
                                    class="form-control meta_keyword" value="{{ old('meta_keywords') }}"
                                    placeholder="Meta Keywords...." required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="meta_description" class="form-label">Meta Description <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" name="meta_description" id="meta_description" placeholder="Meta Description...."
                                    rows="6" required>{{ old('meta_description') }}</textarea>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-info waves-effect waves-light w-md">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/scripts/choices.min.js"></script>

    <script>
        $(document).ready(function() {

            // Choice.js plugin
            const product_tags = new Choices('.meta_keyword', {
                removeItems: true,
                duplicateItemsAllowed: false,
                removeItemButton: true,
                delimiter: ',',
            });

            // Ckeditor 5 plugin
            let jReq;
            ClassicEditor
                .create(document.querySelector('#description'))
                .then(newEditor => {
                    jReq = newEditor;
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#menu_type').change(function() {
                const menuType = $(this).val();

                if (menuType === '2') {
                    $('#footer_menu_section').show();
                    $('#section_type').attr('required', true);
                } else {
                    $('#footer_menu_section').hide();
                    $('#section_type').removeAttr('required');
                }
            });
        });

        function generateSlug() {
            const title = document.getElementById('title').value;
            const slug = title
                .toLowerCase() // Convert to lowercase
                .replace(/[^a-z0-9\s-]/g, '') // Remove invalid characters
                .replace(/\s+/g, '-') // Replace spaces with dashes
                .replace(/-+/g, '-'); // Remove consecutive dashes
            document.getElementById('url_slug').value = slug;
        }
    </script>
@endpush
