<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuideContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;


class GuideContentController extends Controller
{
    // protected $faq;
    public $user;

    public function __construct()
    {
        // $this->faq     = $faq;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.view')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $data['title'] = "Manage Guide Content";
        $data['row'] = GuideContent::first();
        return view('admin.pages.guide_content.index', $data);
    }

    // public function create()
    // {
    //     // if (is_null($this->user) || !$this->user->can('admin.faq.create')) {
    //     //     abort(403, 'Sorry !! You are Unauthorized.');
    //     // }
    //     $data['title'] = "Create Content Generator";
    //     return view('admin.pages.content_generator.create', $data);
    // }

    // public function store(Request $request)
    // {
    //     // if (is_null($this->user) || !$this->user->can('admin.faq.create')) {
    //     //     abort(403, 'Sorry !! You are Unauthorized.');
    //     // }
    //     $request->validate([
    //         'title' => 'required',
    //         'body' => 'required',
    //     ]);

    //     DB::beginTransaction();

    //     try {

    //         $faq                   = new Faq();
    //         $faq->title            = $request->title;
    //         $faq->body             = $request->body;
    //         $faq->is_active        = $request->is_active;
    //         $faq->order_id         = Faq::max('order_id') + 1;
    //         $faq->created_by       = Auth::user()->id;
    //         $faq->created_at       = date('Y-m-d H:i:s');
    //         $faq->save();
    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         Toastr::error(__('messages.toastr.faq_create_error'), 'Error', ["positionClass" => "toast-top-center"]);
    //         return back();
    //     }
    //     DB::commit();
    //     Toastr::success(__('messages.toastr.faq_create_success'), 'Success', ["positionClass" => "toast-top-center"]);
    //     return redirect()->route('admin.faq.index');
    // }


    // public function edit($id)
    // {
    //     // if (is_null($this->user) || !$this->user->can('admin.faq.edit')) {
    //     //     abort(403, 'Sorry !! You are Unauthorized.');
    //     // }

    //     $data['title'] = "Update Pricing Table";
    //     // $data['row'] = Faq::find($id);
    //     return view('admin.pages.pricing.edit', compact('data'));
    // }

    public function update(Request $request, $id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $request->validate([
            'title' => 'required|max:50',
            'short_desc' => 'required|max:120',
            'action_text' => 'max:50',
            'title_1' => 'required|max:50',
            'title_2' => 'required|max:50',
            'title_3' => 'required|max:50',
            'desc_1' => 'required|max:120',
            'desc_2' => 'required|max:120',
            'desc_3' => 'required|max:120',
            'video_text' => 'max:50',
            'video_link' => 'required',
        ]);


        DB::beginTransaction();
        try {
            $guideContent                   = GuideContent::findOrFail($id);

            $guideContent->title            = $request->title;
            $guideContent->short_desc       = $request->short_desc;
            $guideContent->action_text      = $request->action_text;
            $guideContent->action_link      = $request->action_link;
            $guideContent->title_1          = $request->title_1;
            $guideContent->title_2          = $request->title_2;
            $guideContent->title_3          = $request->title_3;
            $guideContent->desc_1           = $request->desc_1;
            $guideContent->desc_2           = $request->desc_2;
            $guideContent->desc_3           = $request->desc_3;
            $guideContent->video_text       = $request->video_text;
            $guideContent->video_link       = $request->video_link;

            $guideContent->update();

        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            Toastr::error("Guide Content Update error", 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success("Guide Content Updated Successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.guide-content.index');
    }


    // public function view($id)
    // {
    //     // if (is_null($this->user) || !$this->user->can('admin.faq.view')) {
    //     //     abort(403, 'Sorry !! You are Unauthorized.');
    //     // }

    //     $data['title'] = __('messages.common.faq_view');
    //     $data['row'] = Faq::find($id);

    //     return view('admin.faq.view', compact('data'));
    // }



    // public function delete($id)
    // {
    //     // if (is_null($this->user) || !$this->user->can('admin.faq.delete')) {
    //     //     abort(403, 'Sorry !! You are Unauthorized.');
    //     // }

    //     $faq = Faq::findOrFail($id);
    //     $faq->delete();
    //     Toastr::success(__('messages.toastr.faq_delete'), 'Success', ["positionClass" => "toast-top-center"]);
    //     return redirect()->back();
    // }
}
