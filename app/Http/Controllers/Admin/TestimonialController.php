<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\HomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    protected $testimonial;
    public $user;

    public function __construct(Testimonial $testimonial)
    {
        $this->testimonial     = $testimonial;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('admin.promotions.index')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title']    = "Manage Testimonial Section";
        $data['section']  = HomePage::where('url_slug', 'testimonial-section')->first();
        $data['rows']     = Testimonial::orderBy('id', 'asc')->get();
        return view('admin.pages.testimonial.index', $data);
    }

    public function create()
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.create')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }
        $data['title'] = "Create Testimonials";
        return view('admin.pages.testimonial.create', $data);
    }

    public function store(Request $request)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.create')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $request->validate([
            'name'          => 'required|max:155|unique:testimonials,name',
            'designation'   => 'required',
            'description'   => 'required',
            'image'         => 'required|image|mimes:png,jpg,jpeg,webp',
        ]);

        DB::beginTransaction();
        try {
            $testimonial                   = new Testimonial();

            $testimonial->name             = $request->name;
            $testimonial->designation      = $request->designation;
            $testimonial->description      = $request->description;
            $testimonial->status           = $request->status;

            if( $request->hasFile('image') ){
                $images = $request->file('image');
                $imageName          =  rand(1, 99999999) . '.' . $images->getClientOriginalExtension();
                $imagePath          = 'adminPanel/images/testimonials/';
                $images->move($imagePath, $imageName);
                $testimonial->image        =  $imagePath . $imageName;
            }
            $testimonial->save();

        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            Toastr::error("Testimonials Create Error", 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success("Testimonials Create Successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.testimonials.index');
    }


    public function edit($id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $data['title'] = "Update testimonials";
        $data['row'] = Testimonial::findOrFail($id);
        return view('admin.pages.testimonial.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $request->validate([
            'name'          => 'required|max:155|unique:testimonials,name,'. $id,
            'designation'   => 'required',
            'description'   => 'required',
            'image'         => 'image|mimes:png,jpg,jpeg,webp',
        ]);

        DB::beginTransaction();
        try {
            $testimonial                   = Testimonial::findOrFail($id);

            $testimonial->name             = $request->name;
            $testimonial->designation      = $request->designation;
            $testimonial->description      = $request->description;
            $testimonial->status           = $request->status;

            if( $request->hasFile('image') ){
                $images = $request->file('image');

                if( !empty($testimonial->image) && file_exists($testimonial->image) ){
                    unlink($testimonial->image);
                }

                $imageName          =  rand(1, 99999999) . '.' . $images->getClientOriginalExtension();
                $imagePath          = 'adminPanel/images/testimonials/';
                $images->move($imagePath, $imageName);
                $testimonial->image        =  $imagePath . $imageName;
            }
            $testimonial->save();
        } catch (\Exception $e) {
            DB::rollback();
            // dd($e);
            Toastr::error("Testimonials Update Error", 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success("Testimonials Update Successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.testimonials.index');
    }

    public function sectionupdate(Request $request, $id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        // dd( $request->all());

        $request->validate([
            'title'       => 'required',
            'subtitle'    => 'required',
        ]);

        DB::beginTransaction();

        try {
            $homePage                   = HomePage::findOrFail($id);
            $homePage->title            = $request->title;
            $homePage->subtitle         = $request->subtitle;
            $homePage->is_active        = $request->is_active;
            $homePage->save();

        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            Toastr::error("Testimonial section updated error", 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success("Testimonial section updated successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function delete($id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.delete')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $testimonial = Testimonial::findOrFail($id);

        if( !empty($testimonial->image) && file_exists($testimonial->image) ){
            @unlink($testimonial->image);
        }

        $testimonial->delete();

        Toastr::success("Testimonial deleted successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
