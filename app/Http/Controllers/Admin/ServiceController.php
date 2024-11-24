<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\HomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    protected $service;
    public $user;

    public function __construct(Service $service)
    {
        $this->service     = $service;
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

        $data['title']    = "Manage Service Section";
        $data['section']  = HomePage::where('url_slug', 'service-section')->first();
        $data['rows']     = Service::orderBy('id', 'asc')->get();
        return view('admin.pages.service_section.index', $data);
    }

    public function create()
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.create')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }
        $data['title'] = "Create Services";
        return view('admin.pages.service_section.create', $data);
    }

    public function store(Request $request)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.create')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $request->validate([
            'icon'          => 'required',
            'title'         => 'required|max:155|unique:services,title',
            'description'   => 'required',
            'image'         => 'required|image|mimes:png,jpg,jpeg,webp',
        ]);

        DB::beginTransaction();
        try {
            $service                   = new Service();
            $service->icon             = $request->icon;
            $service->title            = $request->title;
            $service->description      = $request->description;
            $service->status           = $request->status;

            if( $request->hasFile('image') ){
                $images = $request->file('image');
                $imageName          =  rand(1, 99999999) . '.' . $images->getClientOriginalExtension();
                $imagePath          = 'adminPanel/images/services/';
                $images->move($imagePath, $imageName);
                $service->image        =  $imagePath . $imageName;
            }
            $service->save();

        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            Toastr::error("Services Create Error", 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success("Services Create Successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.services.index');
    }


    public function edit($id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $data['title'] = "Update services";
        $data['row'] = Service::findOrFail($id);
        return view('admin.pages.service_section.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        // dd($request->all(),  $id);

        $request->validate([
            'icon'          => 'required',
            'title'         => 'required|max:155|unique:services,title,'. $id,
            'description'   => 'required|max:128',
            'image'         => 'image|mimes:png,jpg,jpeg,webp',
        ]);

        DB::beginTransaction();
        try {
            $service                   = Service::findOrFail($id);

            $service->icon             = $request->icon;
            $service->title            = $request->title;
            $service->description      = $request->description;
            $service->status           = $request->status;

            if( $request->hasFile('image') ){
                $images = $request->file('image');

                if( !empty($service->image) && file_exists($service->image) ){
                    unlink($service->image);
                }

                $imageName          =  rand(1, 99999999) . '.' . $images->getClientOriginalExtension();
                $imagePath          = 'adminPanel/images/services/';
                $images->move($imagePath, $imageName);
                $service->image     =  $imagePath . $imageName;
            }
            $service->save();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            Toastr::error("Services Update Error", 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success("Services Update Successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.services.index');
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
            Toastr::error("Service section updated error", 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success("Service section updated successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function delete($id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.delete')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $service = Service::findOrFail($id);

        if( !empty($service->image) && file_exists($service->image) ){
            @unlink($service->image);
        }

        $service->delete();

        Toastr::success("Services deleted successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
