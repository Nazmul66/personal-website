<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    protected $homePage;
    public $user;

    public function __construct(HomePage $homePage)
    {
        $this->homePage     = $homePage;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('admin.about.index')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title'] = "Manage About Section";
        $data['row'] = HomePage::where('url_slug', 'about-section')->first();
        return view('admin.pages.about.index', $data);
    }

    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('admin.about.index')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $request->validate([
            'title'        => 'required',
            'subtitle'     => 'required',
            'content'      => 'required',
            'image_path'   => 'image|mimes:png,jpg,jpeg,webp',
        ]);

        DB::beginTransaction();
        try {
            $homePage                   = HomePage::findOrFail($id);
            $homePage->title            = $request->title;
            $homePage->subtitle         = $request->subtitle;
            $homePage->content          = $request->content;
            $homePage->is_active        = $request->is_active;

            if( $request->hasFile('image_path') ){
                $images = $request->file('image_path');

                if( !empty($homePage->image_path) && file_exists($homePage->image_path) ){
                    @unlink($homePage->image_path);
                }
                $imageName          =  rand(1, 99999999) . '.' . $images->getClientOriginalExtension();
                $imagePath          = 'adminasset/assets/images/about/';
                $images->move($imagePath, $imageName);
                $homePage->image_path        =  $imagePath . $imageName;
            }

            $homePage->save();
        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            Toastr::error("About section updated error", 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success("About section updated successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }


}
