<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HowWorks;
use App\Models\HomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class HowWorksController extends Controller
{
    protected $content;
    public $user;

    public function __construct(HowWorks $content)
    {
        $this->content     = $content;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('admin.how-works.index')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title'] = "Manage How It Works Section";
        $data['section'] = HomePage::where('url_slug', 'how-works')->first();
        $data['rows'] = HowWorks::orderBy('order_id', 'asc')->get();
        return view('admin.pages.how_works.index', $data);
    }

    public function create()
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.create')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }
        $data['title'] = "Create Direction";
        return view('admin.pages.how_works.create', $data);
    }

    public function store(Request $request)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.create')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $request->validate([
            'title' => 'required|max:155|unique:how_works,title',
            'description' => 'required|max:512',
        ]);

        DB::beginTransaction();
        try {
            $content                   = new HowWorks();
            $content->title            = $request->title;
            $content->description      = $request->description;
            $content->status           = $request->status;
            $content->order_id         = HowWorks::max('order_id') ? HowWorks::max('order_id') + 1 : 1;
            $content->save();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            Toastr::error("How It Works Direction Create Error", 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success("How It Works Direction Create Successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.how-works.index');
    }


    public function edit($id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $data['title'] = "Update Directions";
        $data['row'] = HowWorks::findOrFail($id);
        return view('admin.pages.how_works.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $request->validate([
            'title' => 'required|max:155|unique:how_works,title,'. $id,
            'description' => 'required|max:512',
            'order_id' => 'required|integer|unique:how_works,order_id,'. $id,
        ]);

        DB::beginTransaction();
        try {
            $content                   = HowWorks::findOrFail($id);
            $content->title            = $request->title;
            $content->description      = $request->description;
            $content->status           = $request->status;
            $content->order_id         = $request->order_id;
            $content->save();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            Toastr::error("Direction Update Error", 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success("Direction Update Successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.how-works.index');
    }

    public function sectionupdate(Request $request, $id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        // dd( $request->all());

        $request->validate([
            'header'    => 'required',
            'title'     => 'required',
            'is_active' => 'required',
            'button_text' => 'required',
            'button_link' => 'required',
            'button_text_2' => 'required',
            'button_link_2' => 'required',
            'icon' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $homePage                   = HomePage::findOrFail($id);
            $homePage->title            = $request->header;
            $homePage->subtitle         = $request->title;
            $homePage->button_text      = $request->button_text;
            $homePage->button_link      = $request->button_link;
            $homePage->button_text_2    = $request->button_text_2;
            $homePage->button_link_2    = $request->button_link_2;
            $homePage->is_active        = $request->is_active;
            $homePage->icon             = $request->icon;
            $homePage->save();

        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            Toastr::error("How it works section updated error", 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success("How it works section updated successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function delete($id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.delete')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $Content = HowWorks::findOrFail($id);
        $Content->delete();

        Toastr::success("Direction deleted successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
