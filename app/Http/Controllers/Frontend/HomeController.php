<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\ContentGenerator;
use App\Models\Faq;
use App\Models\GuideContent;
use App\Models\HomePage;
use App\Models\HowWorks;
use App\Models\Pricing;
use App\Models\Promotion;
use App\Models\Subscription;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $data['faqs'] = Faq::where('status', 1)->orderBy('order_id', 'asc')->get();
        $data['banner_section'] = HomePage::where('url_slug', 'banner-section')->first();
        $data['content_generation_section'] = HomePage::where('url_slug', 'content-section')->first();
        $data['how_works_section'] = HomePage::where('url_slug', 'how-works')->first();
        $data['about_section'] = HomePage::where('url_slug', 'about-section')->first();
        $data['promotion_section'] = HomePage::where('url_slug', 'promotion-section')->first();
        $data['brands'] = Brand::where('status', 1)->orderBy('order_id', 'asc')->get();
        $data['content_generators'] = ContentGenerator::where('status', 1)->orderBy('order_id', 'asc')->get();
        $data['directions'] = HowWorks::where('status', 1)->orderBy('order_id', 'asc')->get();
        $data['promotions'] = Promotion::where('status', 1)->orderBy('order_id', 'asc')->get();
        $data['planMonthly'] = Pricing::where('frequency', '1')->where('status',  '1')->orderBy('order_number', 'asc')->get();
        $data['planYear'] = Pricing::where('frequency', '2')->where('status',  '1')->orderBy('order_number', 'asc')->get();
        return view('frontend.pages.index', $data);
    }

    public function subscription_store(Request $request)
    {
        $request->validate([
            'email' => 'required|max:155|string|email|unique:subscription',
        ]);

        // dd($request->all());
        $existing_data = Subscription::where('email', $request->email)->first();

        if( !empty($existing_data) ){
            Toastr::error("Subscription Email already exists! Please try again.", 'Error', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }

        $subscription = new Subscription();

        $subscription->email       = $request->email;
        $subscription->date        = date("Y-m-d");
        $subscription->order_id    = Subscription::max('order_id') ? Subscription::max('order_id') + 1 : 1;

        $subscription->save();

        Toastr::success("Thank you for subscribing! We're thrilled to have you with us.", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
