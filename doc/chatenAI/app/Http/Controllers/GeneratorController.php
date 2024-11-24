<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneratorController extends Controller
{
    public function codeGenerator()
    {
        return view('generator/codeGenerator');
    }
    
    public function emailGenerator()
    {
        return view('generator/emailGenerator');
    }
    
    public function imageEditor()
    {
        return view('generator/imageEditor');
    }

    public function imageGenerator()
    {
        return view('generator/imageGenerator');
    }

    public function textGenerator()
    {
        return view('generator/textGenerator');
    }

    public function vedioGenerator()
    {
        return view('generator/vedioGenerator');
    }
}
