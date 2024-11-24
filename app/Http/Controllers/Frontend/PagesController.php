<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\SendContact;
use App\Models\Contact;
use App\Models\CustomPage;
use App\Models\Faq;
use App\Models\Pricing;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function blog()
    {
        return view('pages/blog');
    }

    public function faq()
    {
        $data['faqs'] = Faq::where('status', 1)->orderBy('order_id', 'asc')->get();
        return view('pages/faq', $data);
    }

    public function blogDetails()
    {
        return view('pages/blogDetails');
    }

    public function contact()
    {
        return view('pages/contact');
    }

    public function contact_store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:155|string',
            'email' => 'required|max:155|string|email',
            'phone' => 'required',
            'subject' => 'required|max:155',
            'message' => 'required|max:400',
        ]);
        $settings = getSetting();
        DB::beginTransaction();
        try {
            $contact                      = new Contact();
            $contact->name                = $request->name;
            $contact->email               = $request->email;
            $contact->phone               = $request->phone;
            $contact->subject             = $request->subject;
            $contact->message             = $request->message;
            $contact->status              = 1;
            $contact->save();

            $data = [];
            $data = [
                'greeting'    => 'Hello, Admin,',
                'body'        => 'An user send a contact message to your system. Please review and respond to the users query as soon as possible.',
                'name'        => 'User name- '.$request->name,
                'email'       => 'User email- '.$request->email,
                'link'        => route('admin.contact.index'),
                'msg'         => 'Click here to navigate to the query',
                'thanks'      => 'Thank you and stay with ' . ' ' . $settings->site_name ?? config('app.name'),
                'site_url'    => route('index'),
                'footer'      => '0',
                'site_name'   => $settings->site_name ?? config('app.name'),
                'copyright'   => ' © ' . ' ' . Carbon::now()->format('Y') .' '. $settings->site_name ?? config('app.name') . ' ' . 'All rights reserved.',
            ];

            if ($settings->email) {
                Mail::to($settings->email)->send(new SendContact($data));
            }
        }
        catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            Toastr::error(trans('An unexpected error occured while submit your query'), 'Error', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
            // return response()->json(['status' => 'false', 'message' => "There is something wrong !"]);
        }
        DB::commit();
        Toastr::success(trans('Thank you for reaching out! Your message has been successfully sent, and we’ll get back to you shortly.'), 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
        // return response()->json(['status' => 'true', 'message' => "Thank you for reaching out! Your message has been successfully sent, and we’ll get back to you shortly."]);
    }

    public function pricing()
    {
        $data['planMonthly'] = Pricing::where('frequency', '1')->where('status', '1')->orderBy('order_number', 'asc')->get();
        $data['planYear'] = Pricing::where('frequency', '2')->where('status', '1')->orderBy('order_number', 'asc')->get();
        return view('pages/pricing' , $data);
    }

    public function roadmap()
    {
        return view('pages/roadmap');
    }

    public function signin()
    {
        return view('pages/signin');
    }

    public function signup()
    {
        return view('pages/signup');
    }
    // public function styleGuide()
    // {
    //     return view('pages/styleGuide');
    // }
    public function team()
    {
        return view('pages/team');
    }

    public function about()
    {
        $data['row'] = CustomPage::where('url_slug', 'about-us')->first();
        return view('pages/about', $data);
    }

    public function privacy_policy()
    {
        $data['row'] = CustomPage::where('url_slug', 'privacy-policy')->first();
        return view('pages/privacyPolicy', $data);
    }

    public function terms_condition()
    {
        $data['row'] = CustomPage::where('url_slug', 'terms-conditions')->first();
        return view('pages/termsPolicy', $data);
    }

    public function customPage($slug)
    {
        $data['row'] = CustomPage::where('url_slug', $slug)->first();
        return view('pages.custompage', $data);
    }


}
