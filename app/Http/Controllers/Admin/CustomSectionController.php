<?php

namespace App\Http\Controllers\Admin;

// use App\Models\CustomSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\CustomSection;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomSectionController extends Controller
{
    public $user;
    protected $section;
    public function __construct(CustomSection $section)
    {
        $this->section     = $section;

        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index($slug = null)
    {
        // if (is_null($this->user) || !$this->user->can('admin.cpage.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }
        
        $data['row'] = CustomSection::where('slug', $slug)->first();

        if( $slug === "privacy-policy" ){
            $data['title'] = "Update Privacy Policy";
            return view('admin.pages.custom_section.privacy_policy', $data);
        }

        else if( $slug === "terms-condition" ){
            $data['title'] = "Update Terms Condition";
            return view('admin.pages.custom_section.terms_condition', $data);
        }

        else if( $slug === "banner-section" ){
            $data['title'] = "Update Banner Section";
            return view('admin.pages.custom_section.banner', $data);
        }

        else if( $slug === "about-us" ){
            $data['title'] = "Update About Us";
            return view('admin.pages.custom_section.about_us', $data);
        }

        else{
            $data['title'] = "Update Privacy Policy";
            return view('admin.pages.custom_section.privacy_policy', $data);
        }


    }

    public function about_us_update(Request $request, $id)
    {
       dd($id);
    }
    
    public function banner_update(Request $request, $id)
    {
        dd($id);
    }

    public function terms_condition_update(Request $request, $id)
    {
        dd($id);
    }

    public function privacy_policy_update(Request $request, $id)
    {
       dd($id);
    }



    
    // public function update(Request $request, $id)
    // {
    //     DB::beginTransaction();
    //     try {
    //         $page = CustomSection::findOrFail($id);
    //         $page->title = $request->title;
    //         $page->body = $request->body;
    //         $page->is_active = $request->slug;

    //         if ($request->image) {
    //             $image = $request->file('image');
    //             $base_name = preg_replace('/\..+$/', '', $image->getClientOriginalName());
    //             $base_name = explode(' ', $base_name);
    //             $base_name = implode('-', $base_name);
    //             $base_name = Str::lower($base_name);
    //             $image_name = $base_name . "-" . uniqid() . "." . $image->getClientOriginalExtension();
    //             $file_path = '/uploads/section';
    //             $image->move(public_path($file_path), $image_name);
    //             $page->image = $file_path . '/' . $image_name;
    //         }

    //         $page->save();

    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         Toastr::error('Failed to update section: ' . $e->getMessage(), 'Error', ["positionClass" => "toast-top-center"]);
    //         return redirect()->back();
    //     }
    //     DB::commit();
    //     Toastr::success('Section information updated successfully!', 'Success', ["positionClass" => "toast-top-center"]);
    //     return redirect()->back();
    // }



}
