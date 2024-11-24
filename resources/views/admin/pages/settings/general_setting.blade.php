@extends('admin.layouts.master')

@section('title')
    {{ 'Manage General Setting' }}
@endsection

@push('css')
@endpush

@section('content')
    {{-- Breadcrumb --}}
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0 font-size-18">Manage General Setting</h4>
    </div>

    {{-- Body --}}
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('admin.setting.general_store') }}" method="post" enctype="multipart/form-data"
                id="settingUpdate">
                @csrf

                <div class="card">
                    {{-- <div class="card-header bg-primary text-white">
                        <h5 class="m-0">General Settings</h5>
                    </div> --}}

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Site Settings</h3>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <img src="{{ getLogo($settings->site_logo) }}" height="50px">
                                                    <div class="mb-3">
                                                        <label class="form-label">Site Logo
                                                            <br><small class="text-danger fw-bold"><strong>(Recommended
                                                                    Size: 180px * 60px)</strong></small>
                                                        </label>
                                                        <input type="file" class="form-control" style="height: auto;"
                                                            name="site_logo" placeholder="Site Logo..."
                                                            accept=".png,.jpg,.jpeg,.gif,.svg">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <img src="{{ getLogo($settings->admin_logo) }}" height="50px">
                                                    <div class="mb-3">
                                                        <label class="form-label">Admin Logo
                                                            <br><small class="text-danger fw-bold"><strong>(Recommended
                                                                    Size: 180px * 60px)</strong></small>
                                                        </label>
                                                        <input type="file" class="form-control" style="height: auto;"
                                                            name="admin_logo" placeholder="Admin Logo..."
                                                            accept=".png,.jpg,.jpeg,.gif,.svg">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <img src="{{ getSeoImage($settings->seo_image) }}" height="50px">
                                                    <div class="mb-3">
                                                        <label class="form-label">SEO Image
                                                            <br><small class="text-danger fw-bold"><strong>(Recommended
                                                                    Size: 728px * 680px)</strong></small>
                                                        </label>
                                                        <input type="file" class="form-control" style="height: auto;"
                                                            name="seo_image" placeholder="SEO Image..."
                                                            accept=".png,.jpg,.jpeg,.gif,.svg">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    @if ($settings->favicon)
                                                        <img src="{{ getIcon($settings->favicon) }}" height="50px">
                                                    @endif
                                                    <div class="mb-3">
                                                        <label class="form-label">Favicon
                                                            <br><small class="text-danger fw-bold"><strong>( Recommended
                                                                    Size: 200px * 200px )</strong></small>
                                                        </label>
                                                        <input type="file" class="form-control" style="height: auto;"
                                                            name="favicon" placeholder="Favicon..."
                                                            accept=".png,.jpg,.jpeg,.gif,.svg">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row align-items-end">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">App Name</label>
                                                        <input type="text" class="form-control" name="app_name"
                                                            value="{{ env('APP_NAME') }}" placeholder="App Name..."
                                                            readonly="">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label required">Site Name</label>
                                                        <input type="text" class="form-control" name="site_name"
                                                            value="{{ $settings->site_name }}" placeholder="Site Name..."
                                                            required="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label required">Meta Title</label>
                                                        <input type="text" class="form-control" name="seo_meta_title"
                                                            value="{{ old('seo_meta_title', $settings->seo_meta_title) }}"
                                                            placeholder="Meta Title...">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label required">SEO Meta Description</label>
                                                        <textarea class="form-control" name="seo_meta_desc" rows="3" placeholder="SEO Meta Description"
                                                            style="height: 120px !important;" required="">{{ $settings->seo_meta_description }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">SEO Keywords</label>
                                                        <textarea class="form-control required" name="meta_keywords" rows="3"
                                                            placeholder="SEO Keywords (Keyword 1, Keyword 2)" style="height: 120px !important;" required="">{{ $settings->seo_keywords }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label required">Street Address</label>
                                                        <textarea class="form-control" name="address" rows="3" placeholder="Street Address...."
                                                            style="height: 120px !important;">{{ $settings->address }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Google Map</label>
                                                        <textarea class="form-control required" name="google_map" rows="3" placeholder="Google Map...."
                                                            style="height: 120px !important;">{{ $settings->google_map }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">PayPal Settings</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label required">Client Key</label>
                                                    <input type="text" class="form-control" name="paypal_client_key"
                                                        value="{{ $config[4]->config_value }}"
                                                        placeholder="Client Key..." required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label required">Secret</label>
                                                    <input type="text" class="form-control" name="paypal_secret"
                                                        value="{{ $config[5]->config_value }}" placeholder="Secret..."
                                                        required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Stripe Settings</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label required">Publishable Key</label>
                                                    <input type="text" class="form-control"
                                                        name="stripe_publishable_key"
                                                        value="{{ $config[9]->config_value }}"
                                                        placeholder="Publishable Key..." required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label required">Secret</label>
                                                    <input type="text" class="form-control" name="stripe_secret"
                                                        value="{{ $config[10]->config_value }}" placeholder="Secret..."
                                                        required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Social URL</h3>
                                    </div>
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Facebook URL <span
                                                            class="text-danger">*</span></label>
                                                    <input type="url" class="form-control" name="facebook_url"
                                                        value="{{ $settings->facebook_url }}"
                                                        placeholder="Facebook URL...">
                                                    @error('facebook_url')
                                                        <span class="help-block text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Youtube Url</label>
                                                    <input type="url" class="form-control" name="youtube_url"
                                                        value="{{ $settings->youtube_url }}"
                                                        placeholder="Youtube Url...">
                                                    @error('youtube_url')
                                                        <span class="help-block text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Twitter Url</label>
                                                    <input type="url" class="form-control" name="twitter_url"
                                                        value="{{ $settings->twitter_url }}"
                                                        placeholder="Twitter Url...">
                                                    @error('twitter_url')
                                                        <span class="help-block text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Instagram url <span
                                                            class="text-danger">*</span></label>
                                                    <input type="url" class="form-control" name="instagram_url"
                                                        value="{{ $settings->instagram_url }}"
                                                        placeholder="Instagram url'...">
                                                    @error('instagram_url')
                                                        <span class="help-block text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Linkedin url <span
                                                            class="text-danger">*</span></label>
                                                    <input type="url" class="form-control" name="linkedin_url"
                                                        value="{{ $settings->linkedin_url }}"
                                                        placeholder="Linkedin url...">
                                                    @error('linkedin_url')
                                                        <span class="help-block text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Telegram url</label>
                                                    <input type="url" class="form-control" name="telegram_url"
                                                        value="{{ $settings->telegram_url }}"
                                                        placeholder="Linkedin url...">
                                                    @error('telegram_url')
                                                        <span class="help-block text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">WhatsApp Number</label>
                                                    <input type="text" class="form-control" name="whatsapp_number"
                                                        value="{{ $settings->whatsapp_number }}"
                                                        placeholder="WhatsApp Number...">
                                                    @error('whatsapp_number')
                                                        <span class="help-block text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}


                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">General Settings</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label required">App Mode</label>
                                                    <select type="text" class="form-select form-control"
                                                        placeholder="Select a payment mode" style="height: auto;"
                                                        id="select-tags-advanced" name="app_mode" required="">
                                                        <option value="local"
                                                            {{ $settings->app_mode == 'local' ? 'selected' : '' }}>
                                                            Local</option>
                                                        <option value="live"
                                                            {{ $settings->app_mode == 'live' ? 'selected' : '' }}>
                                                            Live</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" name="email" class="form-control"
                                                        value="{{ $settings->email }}">
                                                    @error('email')
                                                        <span class="help-block text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Support Email</label>
                                                    <input type="email" name="support_email" class="form-control"
                                                        value="{{ $settings->support_email }}">
                                                    @error('support_email')
                                                        <span class="help-block text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Phone Number</label>
                                                    <input type="text" name="phone" class="form-control"
                                                        value="{{ $settings->phone_no }}">
                                                    @error('phone_no')
                                                        <span class="help-block text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">(optional) Phone Number</label>
                                                    <input type="text" name="phone_opt" class="form-control"
                                                        value="{{ $settings->phone_optional }}">
                                                    @error('phone_optional')
                                                        <span class="help-block text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success" id="updateButton">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        const form = document.getElementById("settingUpdate");
        const submitButton = form.querySelector("button[type='submit']");

        form.addEventListener("submit", function() {

            $("#updateButton").html(`
            <span id="">
                <span class="spinner-border spinner-border-sm text-white" role="status" aria-hidden="true"></span>
                Updating Setting...
            </span>
        `);

            submitButton.disabled = true;
        });
    </script>
@endpush
