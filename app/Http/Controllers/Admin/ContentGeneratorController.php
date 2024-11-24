<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContentGenerator;
use App\Models\HomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class ContentGeneratorController extends Controller
{
    protected $content;
    public $user;

    public function __construct(ContentGenerator $content)
    {
        $this->content     = $content;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('admin.content-generator.index')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title'] = "Manage Content Generation Section";
        $data['section'] = HomePage::where('url_slug', 'content-section')->first();
        $data['rows'] = ContentGenerator::orderBy('order_id', 'asc')->get();
        return view('admin.pages.content_generator.index', $data);
    }

    public function create()
    {
        // if (is_null($this->user) || !$this->user->can('admin.content-generator.index')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }
        $data['title'] = "Create Content Generator";
        return view('admin.pages.content_generator.create', $data);
    }

    public function store(Request $request)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.create')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $request->validate([
            'icon' => 'required|max:155|string',
            'title' => 'required|max:155|unique:content_generators,title',
            'description' => 'required|max:512',
        ]);

        DB::beginTransaction();
        try {
            $content                   = new ContentGenerator();

            $content->icon             = $request->icon;
            $content->title            = $request->title;
            $content->description      = $request->description;
            $content->status           = $request->status;
            $content->order_id         = ContentGenerator::max('order_id') ? ContentGenerator::max('order_id') + 1 : 1;
            $content->save();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            Toastr::error("Content Generator Create Error", 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success("Content Generator Create Successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.content-generator.index');
    }


    public function edit($id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $data['title'] = "Update Content Generator";
        $data['row'] = ContentGenerator::findOrFail($id);
        return view('admin.pages.content_generator.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $request->validate([
            'icon' => 'required|max:155|string',
            'title' => 'required|max:155|unique:content_generators,title,'. $id,
            'description' => 'required|max:512',
            'order_id' => 'required|integer|unique:content_generators,order_id,'. $id,
        ]);

        DB::beginTransaction();
        try {
            $content                   = ContentGenerator::findOrFail($id);

            $content->icon             = $request->icon;
            $content->title            = $request->title;
            $content->description      = $request->description;
            $content->status           = $request->status;
            $content->order_id         = $request->order_id;
            $content->save();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            Toastr::error("Content Generator Update Error", 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success("Content Generator Update Successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.content-generator.index');
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
            'content'   => 'required',
            'is_active' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $homePage                   = HomePage::findOrFail($id);
            $homePage->title            = $request->header;
            $homePage->subtitle         = $request->title;
            $homePage->content          = $request->content;
            $homePage->is_active        = $request->is_active;
            $homePage->save();

        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            Toastr::error("Content generation section updated error", 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success("Content generation section updated successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function delete($id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.delete')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $Content = ContentGenerator::findOrFail($id);
        $Content->delete();

        Toastr::success("Content Generator deleted successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
