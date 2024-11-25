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
        return view('frontend.pages.index');
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

        $subscription->save();

        Toastr::success("Thank you for subscribing! We're thrilled to have you with us.", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
