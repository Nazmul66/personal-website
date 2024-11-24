<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function blog()
    {
        return view('pages/blog');
    }

    public function blogDetails()
    {
        return view('pages/blogDetails');
    }

    public function contact()
    {
        return view('pages/contact');
    }

    public function pricing()
    {
        return view('pages/pricing');
    }

    public function privacyPolicy()
    {
        return view('pages/privacyPolicy');
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
    public function styleGuide()
    {
        return view('pages/styleGuide');
    }
    public function team()
    {
        return view('pages/team');
    }
    public function termsPolicy()
    {
        return view('pages/termsPolicy');
    }
    public function utilize()
    {
        return view('pages/utilize');
    }

}
