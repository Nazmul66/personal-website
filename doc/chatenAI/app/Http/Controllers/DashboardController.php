<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function appearance()
    {
        return view('dashboard/appearance');
    }
    
    public function application()
    {
        return view('dashboard/application');
    }

    public function chatExport()
    {
        return view('dashboard/chatExport');
    }

    public function help()
    {
        return view('dashboard/help');
    }

    public function notification()
    {
        return view('dashboard/notification');
    }

    public function plansBilling()
    {
        return view('dashboard/plansBilling');
    }

    public function profileDetails()
    {
        return view('dashboard/profileDetails');
    }

    public function releaseNotes()
    {
        return view('dashboard/releaseNotes');
    }

    public function sessions()
    {
        return view('dashboard/sessions');
    }
}
