<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function general_setting()
    {
        $data['title'] = 'Settings';
        // $timezonelist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
        // $currencies = Currency::get();
        $settings = Setting::first();
        $config = DB::table('config')->get();

        return view('admin.pages.settings.general_setting', [
            'settings' => $settings,
            'config' => $config,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // Update Setting
    public function generalStore(Request $request)
    {
        // dd($request->all());

        DB::beginTransaction();
        try {
            $setting                         = Setting::find(1);
            // $setting->google_key          = $request->google_key;
            $setting->site_name              = $request->site_name;
            // $setting->site_title          = $request->site_title;
            $setting->email                  = $request->email;
            $setting->support_email          = $request->support_email;
            $setting->phone_no               = $request->phone;
            $setting->phone_optional         = $request->phone_opt;
            $setting->seo_meta_title         = $request->seo_meta_title;
            $setting->seo_keywords           = $request->meta_keywords;
            $setting->seo_meta_description   = $request->seo_meta_desc;
            // $setting->status            = 1;
            // $setting->authenticator     = $request->authenticator;
            // $setting->sms               = $request->sms;
            // $setting->sidebar_color     = $request->sidebar_color;
            // $setting->ip_restriction    = $request->ip_restriction;
            
            // $setting->google_analytics_id = $request->google_analytics_id;
            // $setting->tawk_chat_bot_key = $request->tawk_chat_bot_key;
            // $setting->application_type  = $request->application_type;
            // $setting->facebook_client_id  = $request->facebook_client_id;
            // $setting->facebook_client_secret  = $request->facebook_client_secret;
            // $setting->google_client_id  = $request->google_client_id;
            // $setting->google_client_secret  = $request->google_client_secret;
            // $setting->facebook_callback_url  = URL::to('/').'/auth/facebook/callback';
            // $setting->google_callback_url  = URL::to('/').'/auth/google/callback';
            // $setting->name              = trim($request->mail_sender, " ");
            // $setting->address           = trim($request->mail_address, " ");
            // $setting->driver            = trim($request->mail_driver, " ");
            // $setting->host              = trim($request->mail_host, " ");
            // $setting->port              = trim($request->mail_port, " ");
            // $setting->encryption        = trim($request->mail_encryption, " ");
            // $setting->username          = trim($request->mail_username, " ");
            // $setting->password          = trim($request->mail_password, " ");
            $setting->app_mode                      = $request->app_mode;
            $setting->facebook_url                  = $request->facebook_url;
            $setting->youtube_url                   = $request->youtube_url;
            $setting->twitter_url                   = $request->twitter_url;
            $setting->linkedin_url                  = $request->linkedin_url;
            $setting->telegram_url                  = $request->telegram_url;
            $setting->whatsapp_number               = $request->whatsapp_number;
            // $setting->ios_app_url                = $request->ios_app_url;
            // $setting->android_app_url            = $request->android_app_url;
            // $setting->email                      = $request->email;
            // $setting->phone_no                   = $request->phone_no;
            // $setting->office_address             = $request->office_address;
            $setting->instagram_url                 = $request->instagram_url;
            $setting->address                       = $request->address;
            $setting->google_map                    = $request->google_map;


            // $setting->pinterest_url     = $request->pinterest_url;
            // $setting->main_motto        = $request->main_motto;
            if ($request->favicon) {
                $favicon = $request->file('favicon');
                // dd($favicon);
                $base_name = preg_replace('/\..+$/', '', $favicon->getClientOriginalName());
                $base_name = explode(' ', $base_name);
                $base_name = implode('-', $base_name);
                $base_name = Str::lower($base_name);
                $image_name = $base_name . "-" . uniqid() . "." . $favicon->getClientOriginalExtension();
                $file_path = '/uploads/icon';
                $favicon->move(public_path($file_path), $image_name);
                $setting->favicon = $file_path . '/' . $image_name;
                // $favi_icon = '/uploads/icon/' . 'IMG-' . time() . '.' . $request->favi_icon->extension();
                // $request->favi_icon->move(public_path('uploads/icon'), $favi_icon);
                // $setting->favicon    = $favi_icon;
            }

            if ($request->site_logo) {
                $site_logo = $request->file('site_logo');
                $base_name = preg_replace('/\..+$/', '', $site_logo->getClientOriginalName());
                $base_name = explode(' ', $base_name);
                $base_name = implode('-', $base_name);
                $base_name = Str::lower($base_name);
                $image_name = $base_name . "-" . uniqid() . "." . $site_logo->getClientOriginalExtension();
                $file_path = '/uploads/logo';
                $site_logo->move(public_path($file_path), $image_name);
                $setting->site_logo = $file_path . '/' . $image_name;

                // $site_logo = '/uploads/logo/' . 'IMG-' . time() . '.' . $request->site_logo->extension();
                // $request->site_logo->move(public_path('uploads/logo'), $site_logo);
                // $setting->site_logo    = $site_logo;
            }
            if ($request->seo_image) {
                $seo_image = $request->file('seo_image');
                $base_name = preg_replace('/\..+$/', '', $seo_image->getClientOriginalName());
                $base_name = explode(' ', $base_name);
                $base_name = implode('-', $base_name);
                $base_name = Str::lower($base_name);
                $image_name = $base_name . "-" . uniqid() . "." . $seo_image->getClientOriginalExtension();
                $file_path = '/uploads/logo';
                $seo_image->move(public_path($file_path), $image_name);
                $setting->seo_image = $file_path . '/' . $image_name;

                // $seo_image = '/uploads/logo/' . 'IMG-' . time() . '.' . $request->seo_image->extension();
                // $request->seo_image->move(public_path('uploads/logo'), $seo_image);
                // $setting->seo_image    = $seo_image;
            }
            if ($request->admin_logo) {
                $admin_logo = $request->file('admin_logo');
                $base_name = preg_replace('/\..+$/', '', $admin_logo->getClientOriginalName());
                $base_name = explode(' ', $base_name);
                $base_name = implode('-', $base_name);
                $base_name = Str::lower($base_name);
                $image_name = $base_name . "-" . uniqid() . "." . $admin_logo->getClientOriginalExtension();
                $file_path = '/uploads/logo';
                $admin_logo->move(public_path($file_path), $image_name);
                $setting->admin_logo = $file_path . '/' . $image_name;

                // $admin_logo = '/uploads/logo/' . 'IMG-' . time() . '.' . $request->admin_logo->extension();
                // $request->admin_logo->move(public_path('uploads/logo'), $admin_logo);
                // $setting->admin_logo    = $admin_logo;
            }

            $setting->update();

            $double_site_name = str_replace('"', '', trim($request->site_name, '"'));
            $space_name = str_replace("'", '', trim($double_site_name, "'"));
            $site_name = str_replace(" ", '', trim($space_name, " "));

            // dd($request->share_content);

            DB::table('config')->where('config_key', 'site_name')->update([
                'config_value' => $site_name
            ]);

            if ( $request->timezone ) {
                DB::table('config')->where('config_key', 'timezone')->update([
                    'config_value' => $request->timezone,
                ]);
            }
            if ( $request->currency ) {
                DB::table('config')->where('config_key', 'currency')->update([
                    'config_value' => $request->currency,
                ]);
            }

            if ( $request->paypal_mode ) {
                DB::table('config')->where('config_key', 'paypal_mode')->update([
                    'config_value' => $request->paypal_mode,
                ]);
            }
            if ( $request->paypal_client_key ) {
                DB::table('config')->where('config_key', 'paypal_client_id')->update([
                    'config_value' => $request->paypal_client_key,
                ]);
            }
            if ( $request->paypal_secret ) {
                DB::table('config')->where('config_key', 'paypal_secret')->update([
                    'config_value' => $request->paypal_secret,
                ]);
            }
            if ( $request->stripe_publishable_key ) {
                DB::table('config')->where('config_key', 'stripe_publishable_key')->update([
                    'config_value' => $request->stripe_publishable_key,
                ]);
            }
            if ( $request->stripe_secret ) {
                DB::table('config')->where('config_key', 'stripe_secret')->update([
                    'config_value' => $request->stripe_secret,
                ]);
            }

            // DB::table('config')->where('config_key', 'share_content')->update([
            //     'config_value' => $request->share_content,
            // ]);

            // if($request->primary_image){
            //     $primary_image = '/uploads/assets/elements/' . 'IMG-' . time() . '.' . $request->primary_image->extension();
            //     $request->primary_image->move(public_path('/uploads/assets/elements'), $primary_image);
            //     DB::table('config')->where('config_key', 'primary_image')->update([
            //         'config_value' => $primary_image,
            //     ]);
            // }
            // if($request->secondary_image){
            //     $secondary_image = '/uploads/assets/' . 'IMG-' . time() . '.' . $request->secondary_image->extension();
            //     $request->secondary_image->move(public_path('/uploads/assets/elements'), $secondary_image);
            //     DB::table('config')->where('config_key', 'secondary_image')->update([
            //         'config_value' => $secondary_image,
            //     ]);
            // }
            // DB::table('config')->where('config_key', 'razorpay_key')->update([
            //     'config_value' => $request->razorpay_client_key,
            // ]);
            // DB::table('config')->where('config_key', 'razorpay_secret')->update([
            //     'config_value' => $request->razorpay_secret,
            // ]);
            // DB::table('config')->where('config_key', 'term')->update([
            //     'config_value' => $request->term,
            // ]);
            // DB::table('config')->where('config_key', 'app_theme')->update([
            //     'config_value' => $request->app_theme,
            // ]);
            // DB::table('config')->where('config_key', 'bank_transfer')->update([
            //     'config_value' => $request->bank_transfer,
            // ]);
            // $app_name                = str_replace('"', '', $request->app_name);
            // $app_name                = str_replace(' ', '', $app_name);
            // $mailer                  = str_replace(" ", '', trim($request->mail_driver, " "));
            // $host                    = str_replace(" ", '', trim($request->mail_host, " "));
            // $port                    = str_replace(" ", '', trim($request->mail_port, " "));
            // $username                = str_replace(" ", '', trim($request->mail_username, " "));
            // $password                = str_replace(" ", '', trim($request->mail_password, " "));
            // $encryption              = str_replace(" ", '', trim($request->mail_encryption, " "));
            // $from_address            = str_replace(" ", '', trim($request->mail_address, " "));
            // $from_name               = str_replace(" ", '', trim('"' . $request->mail_sender . '"', " "));
            // $image_limit             = str_replace('"', '', $request->image_limit);
            // $recaptcha_enable        = str_replace('"', '', $request->recaptcha_enable);
            // $recaptcha_site_key      = str_replace('"', '', $request->recaptcha_site_key);
            // $recaptcha_secret_key    = str_replace('"', '', $request->recaptcha_secret_key);
            // $this->changeEnv([
            //     'APP_NAME'               => '"'.$app_name.'"',
            //     'TIMEZONE'               => $request->timezone,
            //     'APP_TYPE'               => $request->app_type,
            //     'COOKIE_CONSENT_ENABLED' => $request->cookie,
            //     'MAIL_MAILER'            => $mailer,
            //     'MAIL_HOST'              => $host,
            //     'MAIL_PORT'              => $port,
            //     'MAIL_USERNAME'          => $username,
            //     'MAIL_PASSWORD'          => $password,
            //     'MAIL_ENCRYPTION'        => $encryption,
            //     'MAIL_FROM_ADDRESS'      => $from_address,
            //     'MAIL_FROM_NAME'         => $from_name,
            //     'GOOGLE_ENABLE'          => $request->google_auth_enable,
            //     'GOOGLE_CLIENT_ID'       => $request->google_client_id,
            //     'GOOGLE_CLIENT_SECRET'   => $request->google_client_secret,
            //     'GOOGLE_REDIRECT'        => $request->google_redirect,
            //     'SIZE_LIMIT'             => 1024,
            //     'RECAPTCHA_ENABLE'       => $recaptcha_enable,
            //     'RECAPTCHA_SITE_KEY'     => $recaptcha_site_key,
            //     'RECAPTCHA_SECRET_KEY'   => $recaptcha_secret_key
            // ]);

        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            return redirect()->back()->with('error', 'Settings not Updated');
        }

        DB::commit();
        Toastr::success(trans('Settings Updated Successfully!'), 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
